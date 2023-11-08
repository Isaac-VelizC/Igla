@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <h1 style="color: black">Estudiantes</h1>
                  <a class="btn btn-warning" href="{{ route('admin.inscripcion') }}">
                     <i class="bi bi-heart"></i> Inscribir
                  </a>
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
                        <th>Nombre Completo</th>
                        <th>E-mail</th>
                        <th>C.I.</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estado</th>
                        <th>Tags</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach ($estudiantes as $item)
                        <tr>
                            <td><p>{{ $item->persona->nombre }} {{$item->persona->ap_paterno}} {{$item->persona->ap_materno}}</p></td>
                            <td> <p><a href="#0">{{ $item->persona->email }}</a></p></td>
                            <td><p>{{ $item->persona->ci }}</p></td>
                            <td><p>{{ $item->fecha_nacimiento }}</p></td>
                            <td>
                              @if ($item->estado == true)
                                 <p> <span class="badge rounded-pill bg-info text-white">Activo</span></p>
                              @else
                                 <p> <span class="badge rounded-pill bg-danger text-white">Inactivo</span></p>
                              @endif
                            </td>
                            <td>
                              <div class="flex align-items-center list-user-action">
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar"  href="#">
                                    <i class="bi bi-person-gear"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"  href="{{ route('admin.estudiante.show', $item->persona->id) }}">
                                    <i class="bi bi-eye"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"  href="#">
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

@endsection