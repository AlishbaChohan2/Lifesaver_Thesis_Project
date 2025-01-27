<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('home'); // Home page
});


// Handle form submission

Route::get('/call_lifesaver', [FormController::class, 'showForm'])->name('show.form');
Route::post('/call_lifesaver', [FormController::class, 'storeForm']);

Route::get('/form-success', function () {
    return view('form_success');
})->name('form.success');
