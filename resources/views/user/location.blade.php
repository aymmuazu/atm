<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <title>My Location - {{config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('password') }}">
                                        {{ __('Password') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container pt-5 text-center">
            <h2 class="pt-2 mb-4" style="font-weight: bold">My Location 🌍</h2>
            <div id="canvas" style="width: 100%; height: 60%;"></div>
        </div>
        <script>
         function getGeolocation() {
           navigator.geolocation.getCurrentPosition(drawMap);
         }
         function drawMap(geoPos) {
           geolocate = new google.maps.LatLng(geoPos.coords.latitude, geoPos.coords.longitude);
           let mapProp = {
             center: geolocate,
             zoom:15,
           };
           let map=new google.maps.Map(document.getElementById('canvas'),mapProp);
           let infowindow = new google.maps.InfoWindow({
             map: map,
             position: geolocate,
             content:
               `Location:
                  <br>Latitude: ${geoPos.coords.latitude}
                  <br>Longitude: ${geoPos.coords.longitude}`
              });
         }
         getGeolocation();
        </script>
        <script>
          
               `Location:
                  <br>Latitude: ${geoPos.coords.latitude}
                  <br>Longitude: ${geoPos.coords.longitude}`
          ;
        </script>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB0ybb3hsDdLhdswqTdPknzm3YpEUn_WDA"></script>
        
        <div class="container pt-5 mb-3 text-center">
            <h2 class="pt-2 mb-4" style="font-weight: bold">My Locaton was not found 😏</h2>
            <a href="https://map.google.com" class="btn btn-primary">Click here</a>
        </div>