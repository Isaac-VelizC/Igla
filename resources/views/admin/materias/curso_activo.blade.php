@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Cursos activos</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> 

<div class="conatiner-fluid content-inner mt-n5 py-0">
   @if(session('success'))
       <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
           <span>{{ session('success') }}</span>
           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
   @endif
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-body">
              <div class="table-responsive">
                 <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                       <tr>
                          <th>Nombre</th>
                          <th>Docente</th>
                          <th>Aula</th>
                          <th>Modalidad</th>
                          <th>Horario</th>
                          <th>Estado</th>
                          <th></th>
                       </tr>
                    </thead>
                    <tbody>
                     @foreach ($cursos as $item)
                        <tr>
                           <td><p>{{ $item->curso->nombre }}</p></td>
                           <td>
                              <p><a href="{{ route('admin.'. $item->docente->persona->tipo_pers .'.show', [$item->docente->persona->id]) }}">{{ $item->docente->persona->nombre }} {{ $item->docente->persona->ap_paterno }} {{ $item->docente->persona->ap_materno }}</a></p>
                           </td>
                           <td><p>{{ $item->aula->codigo }}</p></td>
                           <td><p>{{ $item->curso->periodo->nombre }}</p></td>
                           <td><p>{{ $item->horario->turno }}</p></td>
                           <td>
                              @if ($item->estado == true)
                                 <p> <span class="badge rounded-pill bg-info text-white">Activo</span></p>
                              @else
                                 <p> <span class="badge rounded-pill bg-danger text-white">Inactivo</span></p>
                              @endif
                           </td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a href="{{ route('admin.cursos.show', [$item->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar">
                                    <i class="bi bi-eye"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"  href="{{ route('admin.asigando.edit', [$item->id]) }}">
                                    <i class="bi bi-pen"></i>
                                 </a>
                                 @if ($item->estado == true)
                                    <a data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#estadoConfirm{{ $item->id }}" data-itemid="{{ $item->id }}">
                                       <i class="bi bi-trash"></i>
                                    </a>
                                 @else
                                    <a data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#estadoConfirm{{ $item->id }}" data-itemid="{{ $item->id }}">
                                       <i class="bi bi-file-arrow-up-fill"></i>
                                    </a>
                                 @endif
                              </div>
                           </td>
                        </tr>
                        @include('admin.materias.modal_activos', ['itemId' => $item->id])
                     @endforeach
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>



@endsection