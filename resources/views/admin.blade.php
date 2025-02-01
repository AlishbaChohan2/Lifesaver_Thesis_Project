@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')

<div class="row">
        <div class="col-sm">
            <div class="signup p-5">
                <p style="font-size:30px;font-weight:bold;text-align:center;margin-top:10px; line-height:35px; color:rgb(60, 60, 60);" class="text-uppercase"> Welcome Back <br>Administrators !</p>
                
                
                    
                   
                    <div class="container-sm">
                        <br>
                         @if ($errors->has('login_error'))
                         
                            <div class="alert alert-danger">
                               
                                {{ $errors->first('login_error') }}
                            </div>
                        @endif
                        
                        <form action="{{ url('/')}}/admin" method="POST">
                            @csrf
                            <input type="email" class="form-control" id="a_email" placeholder="Email" name="a_email"><br>
                            <input type="password" class="form-control" id="a_pswd" placeholder="Password" name="a_pswd"><br>
                            <input type="submit" value="LOG IN" class="btn btn-block" style="color:white;background-color:#A8C449;"><br>
                        </form>
                        <br>
                        <p style="color: #666; font-size: 16px;">
                            Please enter the login details provided to you by the management.  
                            If you experience any issues, contact support for assistance.
                        </p>

                        <br>
                        

                        

                    </div>
                    
                            
                
                


            </div>
        </div>
</div>


<br><br>

@endsection