@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 80px;"></div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    @if(session('success'))
        <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">                
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">Información de la Materia</h4>
                            </div>
                        </div>
                        <hr>
                        <form  class="needs-validation" novalidate method="POST" action="{{ $isEditing ? route('admin.actualizar-curso', $curso->id) : route('admin.guardar-curso') }}">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                          <div class="row">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="row">
                                    <div class="form-group">
                                      <label class="form-label" for="fname">Nombre de Curso:</label>
                                      <input type="text" class="form-control" id="fname" name="nombre" value="{{ old('nombre', $isEditing ? $curso->nombre : '') }}" placeholder="Nombre" required>
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                      <label class="form-label" for="descrip">Descripción</label>
                                      <textarea class="form-control" id="descrip" name="descripcion" rows="3">{{ old('descripcion', $isEditing ? $curso->descripcion : '') }}</textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-lg-6">
                                <div class="row">
                                  <div class="form-group">
                                      <label class="form-label" for="modulo_select">Seleccionar Semestre</label>
                                      <select class="form-select" id="modulo_select" name="modulo_id" required>
                                        <option value="" disabled selected>Seleccionar</option>
                                        @if ($modulos->count() > 0)
                                            @foreach ($modulos as $mod)
                                                <option value="{{ $mod->id }}" @if ($isEditing && $mod->id == $curso->periodo_id) selected @endif>{{ $mod->nombre }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No Hay Sementres</option>
                                        @endif
                                      </select>
                                      @error('modulo_id')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label class="form-label" for="exampleInputcolor">Color del Curso</label>
                                      <input type="color" class="form-control" id="exampleInputcolor" name="color" value="{{ old('color', $isEditing ? $curso->color : '#DD4B27') }}">
                                  </div>
                                </div>
                            </div>
                          </div>
                            <a href="{{ route('admin.cursos') }}" type="button" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Actualizar' : 'Guardar' }}</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
