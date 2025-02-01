@extends('layouts.app')

@section('title', 'Welcome to Life Saver')

@section('content')
   
    <div class="row">
        <div class="col-sm">
            @include('partials.slideshow')
        </div>
    </div>


    <div class="row">
        <div class="col-sm">
            <div class="ab" id="ab">
                <div class="ab-text">
                    <h2>Welcome to <span style="color:#A8C449;">Life Saver</span></h2>
                    <p>
                        The distance between life and death is only a few minutes.<br>
                        Instead of rushing to hospitals or waiting for ambulances,<br>
                        call a lifesaver nearby to reach you earlier in emergencies<br>
                        and <span style="color:#A8C449;font-weight:700;">Change your Life Destination!</span>
                    </p>
                    <img src="{{ asset('images/about2.jpg') }}" alt="CEO Image" style="width:100px;height:100px;border-radius:50px;">
                    <span style="font-weight:900; font-size:22px;margin-left:15px;">CEO, Life Saver</span>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm mt-3 mb-3">
            <div class="team-edit">
                @include('partials.team')
            </div>
        </div>
    </div>
@endsection
