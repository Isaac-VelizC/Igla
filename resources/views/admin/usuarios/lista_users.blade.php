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
              <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
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
                      @foreach ($users as $item)
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
              </div>
           </div>
        </div>
     </div>
  </div>
</div>

@endsection