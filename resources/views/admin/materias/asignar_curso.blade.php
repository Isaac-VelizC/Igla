@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 90px;"></div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">                
        <div class="col-sm-12 col-lg-12">
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
                        <form class="needs-validation" novalidate method="POST" action="{{ $isEditing ? route('admin.asignar.actualizar-curso', $asignado->id) : route('admin.asignar.guardar.curso') }}">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                            <div class="row">
                                <input type="hidden" name="curso" value="{{ $materia->id }}">
                                <div class="col-sm-12 col-lg-6">
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
                                                @error('imagen')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
    const cupoInput = document.getElementById('cupoid');
    document.getElementById('aulaSelect').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const cupo = selectedOption.getAttribute('cupo');
        cupoInput.value = cupo;
    });
</script>
<script>
    var image = document.getElementById('img')
    var input = document.getElementById('customFile')
    input.addEventListener('change', (e) => {
        image.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endsection