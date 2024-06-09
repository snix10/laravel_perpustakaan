<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body style="background-color:ghostwhite">

    @include('home.components.navbar')

    @include('home.components.navBottom')

    <div class="container rounded mt-3  mb-5">

       
        @yield('profile')

       

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>



</body>

</html>
