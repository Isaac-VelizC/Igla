@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endpush

@section('content')
    <div class="position-relative iq-banner">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1 style="color: black">{{ $curso->curso->nombre }}</h1>
                                <p style="color: black">{{ $curso->curso->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div class="row">
        <div class="col-lg-12">
            <div class="card d-flex justify-content-between">
                <nav class="nav">
                    <a class="nav-link" aria-current="page" href="{{ route('cursos.asistencia', [$curso->id]) }}">Asistencia</a>
                    <a class="nav-link active" href="{{ route('cursos.trabajos', [$curso->id]) }}">Trabajos</a>
                    <a class="nav-link" href="{{ route('cursos.estudiantes', [$curso->id]) }}">Calificaciones</a>
                    <a class="nav-link" href="{{ route('cursos.configuracion', [$curso->id]) }}">Configuración</a>
                </nav>
                </div>
                <hr>
            <div class="card-body">
                @yield('curso')
            </div>
        </div>
    </div>
    </div-->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myAwesomeDropzone = {
        headers:{
            'X-CSRF-TOKEN' : "{{csrf_token()}}"
        },
        dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
        maxFiles: 4,
    };
</script>
@endpush