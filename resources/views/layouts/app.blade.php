<!doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IGLA') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/core/libs.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/hope-ui.min.css?v=2.0.0')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/hope-ui.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/custom.min.css?v=2.0.0')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/dark.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets2/css/customizer.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/rtl.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets2/css/modal.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets2/css/dropzone.css')}}"/>
    <link rel='stylesheet' href='{{ asset('assets2/vendor/fullcalendar/core/main.css')}}' />
    <link rel='stylesheet' href='{{ asset('assets2/vendor/fullcalendar/daygrid/main.css')}}' />
    <link rel='stylesheet' href='{{ asset('assets2/vendor/fullcalendar/timegrid/main.css')}}' />
    <link rel='stylesheet' href='{{ asset('assets2/vendor/fullcalendar/list/main.css')}}' />
    <script>
        var baseUrl = {!! json_encode(url('/')) !!}
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @stack('style')
    @livewireStyles
</head>
<body>
    <!-- ======== Preloader =========== -->
    <!--div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div-->
    <!-- ======== Preloader =========== -->
    @if (in_array('Admin', Auth::user()->getRoleNames()->toArray()))
      @include('layouts.navbar.sidebar.admin')
    @elseif (in_array('Chef', Auth::user()->getRoleNames()->toArray()))
        @include('layouts.navbar.sidebar.chef')
    @else
        @include('layouts.navbar.sidebar.estud')
    @endif
    <main class="main-content">
        @include('layouts.navbar.nav')
            @yield('content')
    </main>
    @livewireScripts
    {{-- ...Some more scripts... --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    @stack('scripts')
    <script src="{{ asset('assets2/js/core/libs.min.js')}}"></script>
    <script src="{{ asset('assets2/js/core/external.min.js')}}"></script>
    <script src="{{ asset('assets2/js/charts/widgetcharts.js')}}"></script>
    <script src="{{ asset('assets2/js/charts/vectore-chart.js')}}"></script>
    <script src="{{ asset('assets2/js/charts/dashboard.js')}}" ></script>
    <script src="{{ asset('assets2/js/plugins/fslightbox.js')}}"></script>
    <script src="{{ asset('assets2/js/plugins/setting.js')}}"></script>
    <script src="{{ asset('assets2/js/plugins/slider-tabs.js')}}"></script>
    <script src="{{ asset('assets2/js/plugins/form-wizard.js')}}"></script>
    <script src="{{ asset('assets2/js/hope-ui.js')}}" defer></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/core/main.js')}}'></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/core/locales/es.js')}}'></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/daygrid/main.js')}}'></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/timegrid/main.js')}}'></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/list/main.js')}}'></script>
    <script src='{{ asset('assets2/vendor/fullcalendar/interaction/main.js')}}'></script>
    <script src='{{ asset('assets2/vendor/moment.min.js')}}'></script>
    <script src='{{ asset('assets2/js/plugins/calender.js')}}'></script>
    <script src='{{ asset('assets2/js/cheditor.js')}}'></script>
    <script src='{{ asset('assets2/js/scripts.js')}}'></script>
    <script src='{{ asset('assets2/js/dropzone.js')}}'></script>
    <script src='{{ asset('assets2/js/form_tarea.js')}}'></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editorPregunta1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    
        ClassicEditor
            .create(document.querySelector('#editorPregunta2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    
</body>
</html>