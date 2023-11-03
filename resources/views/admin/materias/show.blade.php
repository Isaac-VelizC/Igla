@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 100px;"></div> 

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
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h4 class="card-title">Bootstrap Datatables</h4>
              </div>
           </div>
           <div class="card-body">
            hola
           </div>
        </div>
     </div>
  </div>
</div>

@endsection