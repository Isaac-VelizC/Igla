@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: black">Dar de Alta un Curso</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">                
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">Información del Curso</h4>
                            </div>
                        </div>
                        <br>
                        <form class="needs-validation" novalidate method="POST" action="{{ $isEditing ? route('admin.asignar.actualizar-curso', $asignado->id) : route('admin.asignar.guardar.curso') }}">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                          <div class="row">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="row">
                                    <div class="form-group">
                                        <label class="form-label" for="docenteSelect">Seleccionar Docente</label>
                                        <select name="id_docente" class="form-select" id="docenteSelect" required>
                                            @if ($docentes->count() > 0)
                                                @foreach ($docentes as $doc)
                                                    <option value="{{ $doc->id }}" @if ($isEditing && $doc->id == $asignado->periodo_id) selected @endif>{{ $doc->persona->nombre }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No hay docentes</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="cursoSelect">Seleccionar Curso</label>
                                        <select name="id_curso" class="form-select" id="cursoSelect" required>
                                            @if ($cursos->count() > 0)
                                                @foreach ($cursos as $cur)
                                                    <option value="{{ $cur->id }}" @if ($isEditing && $cur->id == $asignado->curso_id) selected @endif>{{ $cur->nombre }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No hay cursos</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="hora">Horarios:</label>
                                        @foreach ($horarios as $item)
                                            <div class="form-check d-block">
                                                <input class="form-check-input" type="radio" name="horario" value="{{ $item->id }}" id="horario{{ $item->id }}" required {{ (old('horario', $isEditing ? $asignado->horario_id : '') == $item->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="horario{{ $item->id }}">{{ $item->horarios }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="form-label" for="cupoid">Cupos:</label>
                                      <input type="number" class="form-control" id="cupoid" name="cupo" placeholder="Cupos de Curso" value="{{ old('cupo', $isEditing ? $asignado->asistencia_exacta : '') }}" required min="1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="fechaIniId">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fechaIniId" name="fInico" value="{{ old('fInico', $isEditing ? $asignado->fecha_ini : '') }}" required min="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="fechaFinId">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fechaFinId" name="fFin" value="{{ old('fFin', $isEditing ? $asignado->fecha_fin : '') }}" required min="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="descrip">Descripción</label>
                                        <textarea class="form-control" id="descrip" name="descripcion" rows="3">{{ old('descripcion', $isEditing ? $asignado->descripcion : '') }}</textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-lg-6">
                                  <h5 class="mb-3">Imagen del Curso</h5>
                                  <div class="row">
                                        <div class="position-relative">
                                            <img id="img" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="portada" class="theme-color-default-img rounded portada-300">
                                            <label class="upload-icone-portada bg-primary">
                                                    <input class="file-upload" type="file" name="imagen" id="customFile" accept="image/*">
                                                    <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                        <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                            </label>
                                        </div>
                                  </div>
                              </div>
                          </div>
                           <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Habilitar' }}</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var image = document.getElementById('img')
    var input = document.getElementById('customFile')
    input.addEventListener('change', (e) => {
        image.src = URL.createObjectURL(e.target.files[0]);
    });
    
    document.addEventListener("DOMContentLoaded", function() {
        var fechaInicioInput = document.getElementById('fechaIniId');
        var fechaFinInput = document.getElementById('fechaFinId');

        fechaInicioInput.addEventListener('change', function() {
            if (fechaInicioInput.value > fechaFinInput.value) {
                alert("La fecha de inicio no puede ser mayor que la fecha de fin.");
                fechaInicioInput.value = "";
            }
        });

        fechaFinInput.addEventListener('change', function() {
            if (fechaFinInput.value < fechaInicioInput.value) {
                alert("La fecha de fin no puede ser menor que la fecha de inicio.");
                fechaFinInput.value = "";
            }
        });
    });
</script>
@endsection