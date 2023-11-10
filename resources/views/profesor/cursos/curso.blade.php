@extends('layouts.app')

@section('content')
    <div class="position-relative iq-banner">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1 style="color: black">{{ $curso->curso->nombre }}</h1>
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
                    <a class="nav-link" href="{{ route('cursos.estudiantes', [$curso->id]) }}">Configuración</a>
                </nav>
                </div>
                <hr>
            <div class="card-body">
                @yield('curso')
            </div>
        </div>
    </div>
    </div>
@endsection