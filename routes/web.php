<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('home');
});

// Route to show the form
Route::get('/call_lifesaver', [FormController::class, 'showForm'])->name('show.form');

// Route to handle the form submission
Route::post('/call_lifesaver', [FormController::class, 'storeForm'])->name('store.form');

// Route to show the success page

Route::get('/form-success', function () {
    $data = session('data'); // Retrieve session data
    if (!$data) {
        return redirect('/call_lifesaver')->with('error', 'No data found. Please fill out the form again.'); // Redirect with error if session data is missing
    }
    session()->flush(); // Clear session data after success page
    return view('form_success', ['data' => $data]); // Pass session data to the view
})->name('form.success');