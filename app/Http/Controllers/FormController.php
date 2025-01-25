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
        ]);

       
        $formSubmission = FormSubmission::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'age' => $validated['age'],
            'email' => $validated['email'],
            'location' => $validated['location'], 
            'symptoms' => $validated['symptoms'],    
        ]);

        // Redirect to a success page with the form submission data
        return redirect()->route('form.success')->with('data', $formSubmission);
    }
}
