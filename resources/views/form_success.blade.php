@extends('layouts.app')

@section('title', 'Submission Successful')

@section('content')

@if (session('data'))
    @php
        $data = session('data');
    @endphp
    <div class="row justify-content-center">
        <div class="col-md-6 text-center pt-5 pb-5">
            <div class="p-5">
                <p style="font-size:24px; font-weight:bold; color:rgb(60, 60, 60);">
                    Your request has been submitted successfully!
                </p>
                <p style="font-size:18px;">
                    <strong>Request ID: <span style="color:black;">LS-CAS-{{ $data->id }}</span></strong>
                </p>
                <p style="font-size:18px;">
                    Thank you for your submission. We have contacted the relevant services (if any requested).
                    <br> You can find the details and medical advice below:
                </p>
                <div class="row border rounded p-4 mt-4" style="background-color: #f9f9f9;">
                    <!-- Left Column: User Data -->
                    <div class="col-md-6 text-left">
                        <h4 class="mb-3 text-center" style="color: rgb(60, 60, 60); font-weight: bold;">Your Information</h4>
                        <p><strong>Name:</strong> {{ $data->name }}</p>       
                        <p><strong>Age:</strong> {{ $data->age }}</p>
                        <p><strong>Gender:</strong> {{ $data->gender }}</p>
                        <p><strong>Contact:</strong> {{ $data->contact }}</p>
                        <p><strong>Email:</strong> {{ $data->email }}</p>
                        <p><strong>Location:</strong> {{ $data->location }}</p>
                        <p><strong>Symptoms:</strong> {{ $data->symptoms }}</p>
                        <p><strong>Ambulance Called:</strong> {{ $data->ambulance_needed }}</p>
                        <p><strong>Police Called:</strong> {{ $data->police_needed }}</p>
                    </div>

                    <!-- Right Column: Medical Advice -->
                    <div class="col-md-6">
                        <h4 class="mb-3" style="color: rgb(60, 60, 60); font-weight: bold;">Medical Advice</h4>
                        <div style="background-color: #e9f7ef; padding: 15px; border-radius: 8px; text-align: left;">
                            <ul>
                                @foreach (explode("\n", $data->advice) as $item)
                                    <li>{{ trim($item) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <a href="/" class="btn btn-success mt-4">Go Back to Home</a>
            </div>
        </div>
    </div>
@else
    <script>
        window.location.href = "{{ route('show.form') }}";
    </script>
@endif

@endsection
