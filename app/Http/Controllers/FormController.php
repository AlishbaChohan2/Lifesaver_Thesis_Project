<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;  

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
                'advice' => 'none for now', // You can modify this if you need to set a dynamic value for advice
            ]);
    
            // Flash success message to the session
            // return redirect()->route('form.success', ['data' => $formSubmission]);
            return redirect()->route('form.success')->with('data', $formSubmission);

        } catch (\Exception $e) {
            // Handle exceptions, log the error, and flash error message to the session
            \Log::error('Error while submitting form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while submitting your request. Please try again.');
        }
    }
    

}
