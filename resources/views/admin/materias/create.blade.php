@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: black">Nuevo Curso</h1>
                    </div>
                    @if(session('success'))
                        <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
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
                        <form method="POST" action="{{ $isEditing ? route('admin.actualizar-curso', $curso->id) : route('admin.guardar-curso') }}">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                          <div class="row">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="row">
                                    <div class="form-group">
                                      <label class="form-label" for="fname">Nombre de Curso:</label>
                                      <input type="text" class="form-control" id="fname" name="nombre" value="{{ old('nombre', $isEditing ? $curso->nombre : '') }}" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="aula_select">Seleccionar Aula</label>
                                        <select class="form-select" id="aula_select" name="aula_id">
                                            @foreach ($aulas as $aula)
                                                <option value="{{ $aula->id }}" @if ($isEditing && $aula->id == $curso->aula_id) selected @endif>{{ $aula->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="modulo_select">seleccionar Modulo</label>
                                        <select class="form-select" id="modulo_select" name="modulo_id">
                                            @foreach ($modulos as $mod)
                                                <option value="{{ $mod->id }}" @if ($isEditing && $mod->id == $curso->periodo_id) selected @endif>{{ $mod->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputcolor">Color del Curso</label>
                                        <input type="color" class="form-control" id="exampleInputcolor" name="color" value="{{ old('color', $isEditing ? $curso->color : '#DD4B27') }}">
                                    </div>
                                  </div>
                              </div>
                          </div>
                           <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Guardar' }}</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
