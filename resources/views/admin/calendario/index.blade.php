@extends('layouts.app')

@section('content')
    <div class="position-relative iq-banner">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1 style="color: black">Gestionar Calendario</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          <!-- Nav Header Component End -->
      <!--Nav End-->
    </div>

<div class="conatiner-fluid content-inner mt-n5 py-0">
    @livewire('admin.calendario')
</div>
@endsection