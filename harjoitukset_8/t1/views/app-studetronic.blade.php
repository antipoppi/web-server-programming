<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>StudeTronic</title>

    <!-- Styles -->
    <link href="{{ asset('css/app-studetronic.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/student') }}">
                    StudeTronic
                    </a>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav">       
                        <li><a href="{{ url('/student') }}">Listaa opiskelijat</a></li>
                    </ul>
                    {{-- tarpeettomia
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/studentincourses') }}">Opiskelijan id=1 kurssit</a></li>
                    </ul>
                    <ul class="nav navbar-nav">       
                        <li><a href="{{ url('/studentcredits') }}">Opintosuoriteote opiskelija id=1</a></li>
                    </ul>
                    --}}
                    <ul class="nav navbar-nav">       
                        <li><a href="{{ url('/studentform') }}">Lisää opiskelija</a></li>
                    </ul>
                    <span class="navbar-brand" style="float:right">Tatu A 2020</span>
                </div>
                
            </div> 
        </nav>
        @yield('content')
          
    </div>
    
    <!-- Scripts -->
<script src="{{ asset('js/app-studetronic.js') }}"></script>

</body>
</html>