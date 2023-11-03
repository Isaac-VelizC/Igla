@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Cursos</h1>
                  </div>
                  <div>
                     <a href="{{ route('admin.cursos.new') }}" class="btn btn-outline-secondary">Nuevo Curso</a>
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
                          <th>Aula</th>
                          <th>Periodo</th>
                          <th>Estado</th>
                          <th>Tags</th>
                       </tr>
                    </thead>
                    <tbody>
                     @foreach ($cursos as $item)
                        <tr>
                           <td><p>{{ $item->nombre }}</p></td>
                           <td>
                           <p><a href="#0">{{ $item->aula->nombre }}</a></p>
                           </td>
                           <td>
                           <p>{{ $item->periodo->nombre }}</p>
                           </td>
                           <td>
                           <p>UIdeck digital agency</p>
                           </td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a href="{{ route('admin.asignar.curso') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar">
                                    <i class="bi bi-person-gear"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"  href="{{ route('admin.cursos.edit', [$item->id]) }}">
                                    <i class="bi bi-pen"></i>
                                 </a>
                                 <a data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#deleteConfirm" data-curso-id="{{ $item->id }}">
                                    <i class="bi bi-trash"></i>
                                 </a>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

<div class="modal fade" id="deleteConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               ¿Estás seguro de que deseas eliminar este elemento?
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <form method="POST" action="{{ route('admin.cursos.destroy', [$item->id]) }}">
                     @csrf
                     @method('DELETE')
                    <input type="hidden" name="curso_id" id="curso_id" value="">
                     <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
            </div>
       </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

<script>
   $(document).on('click', '[data-bs-toggle="modal"]', function () {
      var cursoId = $(this).data('curso-id');
      
      if (cursoId !== undefined) {
         $('#curso_id').val(cursoId);
      }
   });
</script>

@endsection