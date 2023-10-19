@extends('layouts.app')

@section('content')

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Hello Devs!</h1>
                        <p>We are on a mission to help developers like you build successful projects for FREE.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>          <!-- Nav Header Component End -->
<!--Nav End-->
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
<div>
  <div class="row">                
      <div class="col-sm-12 col-lg-12">
          <div class="card">
              <div class="card-body">
                <div class="bd-example">
                    <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
                            @include('admin.usuarios.chefs.widgets.form_student')
                        </div>
                        <div class="tab-pane fade" id="pills-profile1" role="tabpanel"
                            aria-labelledby="pills-profile-tab1">
                            <p>
                                Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                                salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                            aria-labelledby="pills-contact-tab1">
                            <p>
                                Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                                stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                dreamcatcher synth.
                            </p>
                            <p>
                                Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                                stumptown aliqua, retro synth master cleanse.
                            </p>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>

@endsection