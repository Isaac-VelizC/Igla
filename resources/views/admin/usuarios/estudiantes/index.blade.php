@extends('layouts.app')

@section('content')
      <!-- Favicon -->
      <link rel="stylesheet" href="{{ asset('assets2/css/core/libs.min.css')}}" />
      <link rel="stylesheet" href="{{ asset('assets2/css/custom.min.css?v=2.0.0')}}" />

    <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Tables</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <a href="#0" class="main-btn light-btn-light rounded-full btn-hover">
                    <i class="lni lni-heart"></i>
                    Nuevo Estudiante
                  </a>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
    
    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              <h6 class="mb-10">Data Table</h6>
              <p class="text-sm mb-20">
                For basic styling—light padding and only horizontal
                dividers—use the class table.
              </p>
              <div class="table-wrapper table-responsive">
                <table id="datatable" class="table"  data-toggle="data-table">
                  <thead>
                    <tr>
                      <th class="lead-info">
                        <h6>Lead</h6>
                      </th>
                      <th class="lead-email">
                        <h6>Email</h6>
                      </th>
                      <th class="lead-phone">
                        <h6>Phone No</h6>
                      </th>
                      <th class="lead-company">
                        <h6>Company</h6>
                      </th>
                      <th>
                        <h6>Action</h6>
                      </th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach ($estudiantes as $item)
                        <tr>
                            <td class="min-width">
                            <div class="lead">
                                <div class="lead-image">
                                <img src="assets/images/lead/lead-1.png" alt="" />
                                </div>
                                <div class="lead-text">
                                <p>{{ $item->name }}</p>
                                </div>
                            </div>
                            </td>
                            <td class="min-width">
                            <p><a href="#0">{{ $item->email }}</a></p>
                            </td>
                            <td class="min-width">
                            <p>(303)555 3343523</p>
                            </td>
                            <td class="min-width">
                            <p>UIdeck digital agency</p>
                            </td>
                            <td>
                            <div class="action">
                                <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                                </button>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- end table -->
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
        
      </div>
      <!-- ========== tables-wrapper end ========== -->
        </div>
    </section>
      
    <!-- Library Script Importantes para las tablas -->
    <script src="{{ asset('assets2/js/core/libs.min.js')}}"></script>
    <script src="{{ asset('assets2/js/hope-ui.js')}}"></script>

@endsection