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
        return redirect('/'); // Redirect to home if no session data is found
    }
    return view('form_success', ['data' => $data]); // Pass session data to the view
})->name('form.success');
