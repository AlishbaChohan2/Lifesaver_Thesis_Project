<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;
use OpenAI;

class FormController extends Controller
{
    public function showForm()
    {
        return view('call_lifesaver');  
    }

    public function storeForm(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email',
            'location' => 'required|string|max:500',
            'symptoms' => 'required|string|max:250',
            'ambulance_needed' => 'required|in:yes,no',
            'police_needed' => 'required|in:yes,no',
        ]);

        try {
            // ChatGPT API integration (Directly in Controller)
            $client = OpenAI::client(config('services.openai.key'));

            // Create the user message content for the prompt
            $userMessage = $validated['ambulance_needed'] === 'yes'
                ? "A person is {$validated['age']} years old and has the following symptoms: {$validated['symptoms']}. An ambulance is on the way. Provide 3 concise urgent first-aid advice separated by newline."
                : "A person is {$validated['age']} years old and has the following symptoms: {$validated['symptoms']}. No ambulance is needed. Provide 3 concise general medical advice in 3 bullted points separated by newline.";

            // Make the API request to OpenAI
            // Make the API request to OpenAI (adjusted for 'chat' API)
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a medical assistant providing safe and helpful advice.'],
                    ['role' => 'user', 'content' => $userMessage],
                ],
                'max_tokens' => 100,
            ]);


            // Extract the advice from the response
            $advice = $response['choices'][0]['message']['content'] ?? 'No advice available.';

            // Save the data into the database
            $formSubmission = FormSubmission::create([
                'name' => $validated['name'],
                'contact' => $validated['contact'],
                'age' => $validated['age'],
                'email' => $validated['email'],
                'location' => $validated['location'],
                'symptoms' => $validated['symptoms'],
                'ambulance_needed' => $validated['ambulance_needed'],
                'police_needed' => $validated['police_needed'],
                'advice' => $advice, // Store ChatGPT-generated advice
            ]);

            // Redirect to success page with form submission data
            return redirect()->route('form.success')->with('data', $formSubmission);

        } catch (\Exception $e) {
            // Handle exceptions, log the error, and flash error message to the session
            \Log::error('Error while submitting form: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
