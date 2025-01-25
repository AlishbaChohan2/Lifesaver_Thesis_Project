<!-- resources/views/form_success.blade.php
@extends('layouts.app')

@section('title', 'Submission Successful')

@section('content')
<div class="row">
    <div class="col-sm text-center pt-5 pb-5">
        <div class="p-5">
            <p style="font-size:24px;font-weight:bold;color:rgb(60, 60, 60);">
                Your request has been submitted successfully!
            </p>
            <p style="font-size:18px;">
                <strong>Request ID: LS-CAS</strong> {{ $data->id }}
            </p>
            <p style="font-size:18px;">
                Thank you for your submission. You can find the details below:
            </p>
            <div class="border rounded p-4 mt-3" style="background-color: #f9f9f9;">
                <p><strong>Name:</strong> {{ $data->name }}</p>
                <p><strong>Contact:</strong> {{ $data->contact }}</p>
                <p><strong>Age:</strong> {{ $data->age }}</p>
                <p><strong>Email:</strong> {{ $data->email }}</p>
                <p><strong>Location:</strong> {{ $data->location }}</p>
                <p><strong>Symptoms:</strong> {{ $data->symptoms }}</p>
            </div>
            <a href="/" class="btn btn-success mt-4">Go Back to Home</a>
        </div>
    </div>
</div>
@endsection


 -->


 <!-- resources/views/form_success.blade.php -->
@extends('layouts.app')

@section('title', 'Submission Successful')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center pt-5 pb-5">
        <div class="p-5">
            <p style="font-size:24px; font-weight:bold; color:rgb(60, 60, 60);">
                Your request has been submitted successfully!
            </p>
            <p style="font-size:18px;">
                <strong>Request ID: LS-CAS-{{ $data->id }}</strong>
            </p>
            <p style="font-size:18px;">
                Thank you for your submission. You can find the details below:
            </p>
            <div class="border rounded p-4 mt-3 mx-auto" style="background-color: #f9f9f9; max-width: 60px;">
                <p><strong>Name:</strong> {{ $data->name }}</p>
                <p><strong>Contact:</strong> {{ $data->contact }}</p>
                <p><strong>Age:</strong> {{ $data->age }}</p>
                <p><strong>Email:</strong> {{ $data->email }}</p>
                <p><strong>Location:</strong> {{ $data->location }}</p>
                <p><strong>Symptoms:</strong> {{ $data->symptoms }}</p>
            </div>
            <a href="/" class="btn btn-success mt-4">Go Back to Home</a>
        </div>
    </div>
</div>
@endsection
