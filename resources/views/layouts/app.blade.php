<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Life Saver')</title>
    @include('partials.links')
   
</head>
<body>
    <div class="container-fluid border">

        <div class="row">
            @include('partials.header')
        </div>
        

        <div class="row">
             @include('partials.menu')
        </div>
       

        <!-- Main Content -->
        <div class="row content">
            <div class="col-sm pt-2 border">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('partials.footer')

    </div>

    
</body>
</html>
