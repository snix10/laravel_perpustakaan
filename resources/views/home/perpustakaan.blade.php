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

<body style="background-color:aliceblue">

    @include('sweetalert::alert')

    @include('home.components.navbar')

    @include('home.components.navBottom')

    <div class="container ">

        @yield('bukus')

        @yield('search')

        @yield('kategoris')

        @yield('lihat')

        @yield('profile')

    </div>

    <div class="container-fluid  mt-5 rounded-bottom" style="border-radius: 50px">
        <div class="container">
            @include('home.components.footer')
        </div>
    </div>
    

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <script>
        // navbar
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("header").classList.remove('show');
            } else {
                document.getElementById("header").classList.add('show');
            }
            prevScrollpos = currentScrollPos;
        }
    </script>



</body>

</html>
