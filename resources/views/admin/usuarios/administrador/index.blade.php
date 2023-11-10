@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Trabajadores!</h1>
                  </div>
                  <div>
                     <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nuevo Personal</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@include('admin.usuarios.chefs.widgets.form_modal', ['formType' => $formType])

<div class="conatiner-fluid content-inner mt-n5 py-0">
   @if(session('errors'))
      <div id="myAlert" class="alert alert-left alert-danger alert-dismissible fade show mb-3 alert-fade" role="alert">
         <span>La validación ha fallado debido a los siguientes errores:</span>
         <ul>
               @foreach (session('errors')->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
         </ul>
         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif
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
                          <th>C.I.</th>
                          <th>E-mail</th>
                          <th>Telefono</th>
                          <th>Estado</th>
                          <th>Tags</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach ($personals as $item)
                        <tr>
                            <td><p>{{ $item->name }}</p></td>
                            <td>
                              <p><a href="#0">{{ $item->email }}</a></p>
                            </td>
                            <td>
                              <p>(303)555 3343523</p>
                            </td>
                            <td>
                              <p>UIdeck digital agency</p>
                            </td>
                            <td>
                              <p>UIdeck digital agency</p>
                            </td>
                            <td>
                              <div class="flex align-items-center list-user-action">
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"  href="#">
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