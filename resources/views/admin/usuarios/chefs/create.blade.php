@extends('layouts.app')

@section('content')

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: black">Docentes</h1>
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
                               <h4 class="card-title">Información del Docente</h4>
                            </div>
                        </div>
                        <br>
                        <form class="needs-validation" novalidate method="POST" action="{{ $isEditing ? route('update.docentes', $docente->id) : route('store.docentes') }}" enctype="multipart/form-data">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="fname">Nombre de docente:</label>
                                            <input type="text" class="form-control" id="fname" name="nombre" value="{{ old('nombre', $isEditing ? $docente->nombre : '') }}" placeholder="Nombre" required>
                                            @error('nombre')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="ap_pat">Apellido Paterno:</label>
                                            <input type="text" class="form-control" id="ap_pat" name="ap_pat" value="{{ old('paterno', $isEditing ? $docente->ap_paterno : '') }}" placeholder="Apellido Paterno">
                                            @error('ap_pat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="ap_mat">Apellido Materno:</label>
                                            <input type="text" class="form-control" id="ap_mat" name="ap_mat" value="{{ old('materno', $isEditing ? $docente->ap_materno : '') }}" placeholder="Apellido Materno">
                                            @error('ap_mat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="ci">Cedula de Identidad:</label>
                                            <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci', $isEditing ? $docente->ci : '') }}" placeholder="Cedula de Identidad" required>
                                            @error('ci')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="form-label">Genero:</label>
                                            <select name="genero" class="selectpicker form-control" data-style="py-0">
                                                <option>Seleccionar Genero</option>
                                                <option value="Hombre" {{ old('genero', $isEditing && $docente->genero == 'Hombre' ? 'selected' : '') }}>Hombre</option>
                                                <option value="Mujer" {{ old('genero', $isEditing && $docente->genero == 'Mujer' ? 'selected' : '') }}>Mujer</option>
                                            </select>
                                            @error('genero')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="mobno">Numero Celular:</label>
                                            <input type="text" class="form-control" id="mobno" name="telefono" value="{{ old('telefono', $isEditing ? $docente->numTelefono->numero_tel : '') }}" placeholder="Numero de Celular">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="email">E mail:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $isEditing ? $docente->email : '') }}" placeholder="E mail" required>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="position-relative">
                                                    @if ($isEditing && $docente->photo)
                                                        <img id="img" src="{{ asset($docente->photo) }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                                                    @else
                                                        <img id="img" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                                                    @endif
                                                    <label class="upload-icone bg-primary">
                                                            <input class="file-upload" type="file" name="perfil" id="customFile" accept="image/*">
                                                            <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                                <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                            </svg>
                                                    </label>
                                                </div>
                                            </div>
                                            @error('perfil')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="fcontratado">Fecha Contratado:</label>
                                            <input type="date" class="form-control" id="fcontratado" name="contrato" max="{{ date('Y-m-d') }}" value="{{ old('contrato', $isEditing ? $docente->docente->contratado_en : date('Y-m-d')) }}">
                                            @error('contrato')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>                                        
                                        <div class="form-group col-md-6">
                                        <label class="form-label" for="horas">Horas de Trabajo:</label>
                                        <input type="number" class="form-control" id="horas" name="horas" value="{{ old('horas', $isEditing ? $docente->docente->max_hora_trabajos : '') }}">
                                        @error('horas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger">Cancelar</button>
                           <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Guardar' }}</button>
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
</script>

@endsection