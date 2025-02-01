<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminLoginController;

// Home page route
Route::get('/', function () {
    return view('home');
});

// Form submission routes
Route::get('/call_lifesaver', [FormController::class, 'showForm'])->name('show.form');
Route::post('/call_lifesaver', [FormController::class, 'storeForm']);

Route::get('/form-success', function () {
    return view('form_success');
})->name('form.success');

// Admin routes
Route::get('/admin', [AdminLoginController::class, 'showAdmin'])->name('show.admin');
Route::post('/admin', [AdminLoginController::class, 'loginAdmin'])->name('login.admin');

// Admin dashboard route with validation for logged-in status
Route::get('/admin_dashboard', [AdminLoginController::class, 'showDashboard'])->name('admin.dashboard');

// Admin logout route
Route::get('/admin/logout', [AdminLoginController::class, 'logoutAdmin'])->name('logout.admin');
