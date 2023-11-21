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
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bd-example">
                            <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="asistencia-tab" data-bs-toggle="tab" data-bs-target="#pills-asistencia1" type="button" role="tab" aria-controls="asistencia" aria-selected="true">Asistencia</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="trabajo-tab" data-bs-toggle="tab" data-bs-target="#pills-trabajo1" type="button" role="tab" aria-controls="trabajo" aria-selected="false">Trabajos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="calificacion-tab" data-bs-toggle="tab" data-bs-target="#pills-calificacion1" type="button" role="tab" aria-controls="calificacion" aria-selected="false">Calificaciones</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="config-tab" data-bs-toggle="tab" data-bs-target="#pills-config1" type="button" role="tab" aria-controls="config" aria-selected="false">Configuración</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-asistencia1" role="tabpanel" aria-labelledby="pills-asistencia-tab1">
                                    @livewire('docente.asistencia-materia', ['id' => $curso->id])
                                </div>
                                <div class="tab-pane fade" id="pills-trabajo1" role="tabpanel" aria-labelledby="pills-trabajo-tab1">
                                    @livewire('docente.trabajo-materia', ['id' => $curso->id])
                                </div>
                                <div class="tab-pane fade" id="pills-calificacion1" role="tabpanel" aria-labelledby="pills-calificacion-tab1">
                                    @livewire('docente.calificacion-materia', ['id' => $curso->id])
                                </div>
                                <div class="tab-pane fade" id="pills-config1" role="tabpanel" aria-labelledby="pills-config-tab1">
                                    @livewire('docente.configuracion-materia', ['id' => $curso->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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