@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Hello Devs!</h1>
                     <p style="color: black">We are on a mission to help developers like you build successful projects for FREE.</p>
                  </div>
                  <div>
                     <button type="button" class="btn btn-outline-secondary">Secondary</button>
                 </div>
              </div>
          </div>
      </div>
  </div>
</div> 

<div class="conatiner-fluid content-inner mt-n5 py-0">
  <div class="row">
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h4 class="card-title">Bootstrap Datatables</h4>
              </div>
           </div>
           <div class="card-body">
              <div class="table-responsive">
                 <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                       <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Salary</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach ($estudiantes as $item)
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
                              <div class="flex align-items-center list-user-action">
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar"  href="#">
                                    <i class="fa fa-user-plus"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"  href="#">
                                    <i class="fa fa-eye"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"  href="#">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"  href="#">
                                    <i class="fa fa-trash"></i>
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