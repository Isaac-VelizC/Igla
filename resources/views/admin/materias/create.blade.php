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
                        <form method="POST" action="{{ $isEditing ? route('admin.actualizar-curso', $task->id) : route('admin.guardar-curso') }}">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif
                          <div class="row">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="row">
                                    <div class="form-group">
                                      <label class="form-label" for="fname">Nombre de Curso:</label>
                                      <input type="text" class="form-control" id="fname" name="nombre" value="{{ old('nombre', $isEditing ? $task->nombre : '') }}" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="aula_select">Seleccionar Aula</label>
                                        <select class="form-select" id="aula_select" name="aula_id">
                                            @foreach ($aulas as $aula)
                                                <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlSelect2">seleccionar Modulo</label>
                                        <select class="form-select" id="exampleFormControlSelect2">
                                        <option>select-1</option>
                                        <option>select-2</option>
                                        </select>
                                    </div>
                                      <div class="form-group">
                                        <label class="form-label" for="exampleInputcolor">Color del Curso</label>
                                        <input type="color" class="form-control" id="exampleInputcolor" name="color" value="{{ old('color', $isEditing ? $task->color : '#DD4B27') }}">
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
