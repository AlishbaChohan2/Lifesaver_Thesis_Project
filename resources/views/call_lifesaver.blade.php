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

                <form action="c_signup.php" method="POST">
                    <br>
                    <div class="container-sm">

                        <input class="form-control" type="text" name="name" id="name" required
                            placeholder="Patient Name*"><br>
                        <input class="form-control" type="text" name="contact" id="contact" required
                            placeholder="Contact*"><br>
                        <input class="form-control" type="number" maxlength="2" name="age" id="age" required
                            placeholder="Patient Age*"><br>
                        <input class="form-control" type="email" name="email" id="email" required
                            placeholder="Email*"><br>
                        <!-- <input class="form-control" type="text" name="city" id="city" required placeholder="City"><br> -->
                        <input class="form-control" type="text" name="pres_add" id="pres_add" required
                            placeholder="Location*"><br>
                        <div id="map" style="height: 150px; width: 100%;"></div>
                        <br>
                        <textarea class="form-control" name="symp" id="symp" style="min-height:150px;" maxlength="250"
                            placeholder="Describe your/patient's Symptoms Briefly*" required></textarea><br>


                        <input type="submit" value="ASK FOR HELP" class="btn btn-danger bold">
                        <br<br>

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