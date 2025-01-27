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
            'age' => 'required|integer',
            'email' => 'required|email',
            'location' => 'required|string|max:500',
            'symptoms' => 'required|string|max:250',
            'ambulance_needed' => 'required|in:yes,no',
            'police_needed' => 'required|in:yes,no',
        ]);

        // Create a new form submission entry in the database
        $formSubmission = FormSubmission::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'age' => $validated['age'],
            'email' => $validated['email'],
            'location' => $validated['location'], 
            'symptoms' => $validated['symptoms'],  
            'ambulance_needed' => $validated['ambulance_needed'],
            'police_needed' => $validated['police_needed'],  
            'advice' => 'none for now',
        ]);

        // Redirect to the success page
        // return redirect()->route('form.success');

        return redirect()->route('form.success')->with('data', $formSubmission);
    }
}
