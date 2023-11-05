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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <nav class="nav">
                                <a class="nav-link active" aria-current="page" href="{{ route('cursos.asistencia', [$curso->id]) }}">Asistencia</a>
                                <a class="nav-link" href="{{ route('cursos.trabajos', [$curso->id]) }}">Trabajos</a>
                                <a class="nav-link" href="{{ route('cursos.estudiantes', [$curso->id]) }}">Estudiantes</a>
                                <a class="nav-link" href="{{ route('cursos.estudiantes', [$curso->id]) }}">Configuración</a>
                            </nav>
                         </div>
                         <div class="card-body">
                            <div class="table-responsive">
                               @yield('curso')
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection