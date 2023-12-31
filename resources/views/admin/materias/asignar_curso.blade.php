@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 90px;"></div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">                
        <div class="col-sm-12 col-lg-12">
            @if(session('error'))
                <div id="myAlert" class="alert alert-left alert-danger alert-dismissible fade show mb-3 alert-fade" role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">{{ $materia->nombre }}</h4>
                               <p>{{ $materia->descripcion }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <form class="needs-validation" novalidate method="POST" action="{{ $isEditing ? route('admin.asignar.actualizar-curso', $asignado->id) : route('admin.asignar.guardar.curso') }}" enctype="multipart/form-data">
                                    @csrf
                                    @if($isEditing)
                                        @method('PUT')
                                    @endif
                                    <input type="hidden" name="curso" value="{{ $materia->id }}">
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex">
                                            @if ($horarios->count() > 0)
                                                @foreach ($horarios as $item)
                                                    <div class="form-check d-block">
                                                        <label class="form-check-label" for="horario{{ $item->id }}">{{ $item->turno }}</label>
                                                        <input class="form-check-input" type="radio" name="horario" value="{{ $item->id }}" id="horario{{ $item->id }}" required {{ (old('horario', $isEditing ? $asignado->horario_id : '') == $item->id) ? 'checked' : '' }} style="margin-right: 10px; margin-left: 10px;">
                                                    </div>
                                                @endforeach
                                            @else
                                                <option value="">No hay Horarios</option>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="docenteSelect">Docentes</label>
                                            <select name="docente" class="form-select" id="docenteSelect" required>
                                                <option value="" selected disabled>Seleccionar</option>
                                                @if ($docentes->count() > 0)
                                                    @foreach ($docentes as $doc)
                                                        <option value="{{ $doc->id }}" @if ($isEditing && $doc->id == $asignado->docente_id) selected @endif>{{ $doc->persona->nombre }} {{ $doc->persona->ap_paterno }} {{ $doc->persona->ap_materno }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">No hay docentes</option>
                                                @endif
                                            </select>
                                            @error('docente')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="aulaSelect">Aulas</label>
                                            <select name="aula" class="form-select" id="aulaSelect" required>
                                                <option value="" selected disabled>Seleccionar</option>
                                                @if ($aulas->count() > 0)
                                                    @foreach ($aulas as $doc)
                                                        <option value="{{ $doc->id }}" cupo="{{$doc->capacidad}}" @if ($isEditing && $doc->id == $asignado->aula_id) selected @endif>{{ $doc->nombre }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">No hay aulas</option>
                                                @endif
                                            </select>
                                            @error('aula')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cupoid">Cupos:</label>
                                            <input type="number" class="form-control" id="cupoid" name="cupo" placeholder="Cupos de Curso" value="{{ old('cupo', $isEditing ? $asignado->aula->capacidad : '') }}" required min="1" disabled>
                                            @error('cupo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="fechaIniId">Fecha Inicio</label>
                                                <input type="date" class="form-control" id="fechaIniId" name="fechaInico" value="{{ old('fechaInico', $isEditing ? $asignado->fecha_ini : '') }}" required min="{{ date('Y-m-d') }}">
                                                @if($errors->has('fechaInico'))
                                                    <div class="alert alert-danger">{{ $errors->first('fechaInico') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="fechaFinId">Fecha Fin</label>
                                                <input type="date" class="form-control" id="fechaFinId" name="fechaFin" value="{{ old('fechaFin', $isEditing ? $asignado->fecha_fin : '') }}" required min="{{ date('Y-m-d') }}">
                                                @if($errors->has('fechaFin'))
                                                    <div class="alert alert-danger">{{ $errors->first('fechaFin') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Habilitar' }}</button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-lg-8">
                                <div id="calendar2" class="calendar-s"></div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

"use strict"

if (document.querySelectorAll('#calendar2').length) {
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar2');
        let calendar2 = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        plugins: ["timeGrid", "dayGrid", "list", "interaction"],
        timeZone: "UTC",
        defaultView: "dayGridMonth",
        locale: 'es',
        displayEventTime:false,
        contentHeight: "auto",
        eventLimit: true,
        droppable: true,
        dayMaxEvents: 4,
        header: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth"
        },
        events: baseUrl+"/calendar/mostrar",
    });
    calendar2.render();
    const cupoInput = document.getElementById('cupoid');
        document.getElementById('aulaSelect').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const cupo = selectedOption.getAttribute('cupo');
            cupoInput.value = cupo;
        });
    });
}
</script>
@endsection