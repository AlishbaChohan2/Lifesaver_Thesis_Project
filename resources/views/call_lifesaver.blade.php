@extends('layouts.app')

@section('title', 'Call Life Saver')


@section('content')

<div class="row">

    <div class="col-sm text-center pt-2 pb-2">
        <br>

        <div class="col-sm">
            <div class="signup p-5">
                <p style="font-size:30px;font-weight:bold;text-align:center;margin-top:10px; line-height:35px; color:rgb(60, 60, 60);"
                    class="text-uppercase"> Call A life saver!</p>


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                
                <form action="{{ url('/')}}/call_lifesaver " method="POST">
                    <br>
                    <div class="container-sm">
                   
                    @csrf
                        <input class="form-control" type="text" name="name" id="name" required
                            placeholder="Patient Name*"><br>
                        <input class="form-control" type="number" maxlength="2" name="age" id="age" required
                            placeholder="Patient Age*"><br>
                        
                        <div class="form-group text-left">
                                <label>Patient Gender  </label>
                                <input type="radio" name="gender" value="female" required> Female
                                <input type="radio" name="gender" value="male" required> Male
                        </div>
                        <input class="form-control" type="text" name="contact" id="contact" required
                            placeholder="Contact*"><br>
                        <input class="form-control" type="email" name="email" id="email" required
                            placeholder="Email*"><br>
                        <!-- <input class="form-control" type="text" name="city" id="city" required placeholder="City"><br> -->
                        <input class="form-control" type="text" name="location" id="location" required
                            placeholder="Location*"><br>
                        <div id="map" style="height: 150px; width: 100%;"></div>
                        <br>
                        <textarea class="form-control" name="symptoms" id="symptoms" style="min-height:150px;" maxlength="250"
                            placeholder="Describe your/patient's Symptoms Briefly*" required></textarea><br>

                            <div class="form-group text-left">
                                <label>Ambulance Needed?</label>
                                <input type="radio" name="ambulance_needed" value="yes" required> Yes
                                <input type="radio" name="ambulance_needed" value="no" required> No
                            </div>
                            <div class="form-group text-left">
                                <label>Police Needed?</label>
                                <input type="radio" name="police_needed" value="yes" required> Yes
                                <input type="radio" name="police_needed" value="no" required> No
                            </div>

                        <input type="submit" value="ASK FOR HELP" class="btn btn-danger btn-lg bold">
                        <br><br>


                        <!-- @if(session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif -->

                    </div>


                </form>

            </div>
        </div>



    </div>
</div>



</form>

</div>
</div>



<span style='color:green;text-align:center;'></span>
<span style='color:red;text-align:center;'></span>
</div>

<script src="{{ asset('js/maps.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADmhOSJwcWFAUM6RzdS44lAMkPe3zJ37U&callback=initMap&libraries=places" async defer></script>



@endsection