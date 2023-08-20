<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IGLA') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" />

</head>
<body>
  
    
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
  
    @if (in_array('admin', Auth::user()->getRoleNames()->toArray()))
      @include('layouts.navbar.sidebar.admin')
    @elseif (in_array('chef', Auth::user()->getRoleNames()->toArray()))
        @include('layouts.navbar.sidebar.chef')
    @else
        @include('layouts.navbar.sidebar.estud')
    @endif
    <main class="main-wrapper {{ 'overflow-hidden'}}">
        @include('layouts.navbar.nav')
        <section class="section">
            @yield('content')
        </section>
    </main>

    
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{ asset('assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js')}}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js')}}"></script>
    <script src="{{ asset('assets/js/world-merc.js')}}"></script>
    <script src="{{ asset('assets/js/polyfill.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>
