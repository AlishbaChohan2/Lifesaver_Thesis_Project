<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/call_lifesaver', function () {
    return view('call_lifesaver');
});

