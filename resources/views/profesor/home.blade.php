@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 90px;">
</div> 
<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
               <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                     <div class="card-body">
                        <div class="progress-widget">
                              <div class="rounded p-3 bg-soft-warning">
                                 <i class="fa fa-users"></i>
                              </div>
                              <a href="{{ route('chef.cursos') }}">
                                 <div class="progress-detail">
                                    <p  class="mb-2">Cursos</p>
                                    <h4 class="counter">{{ $cursos->count() }}</h4>
                                 </div>
                              </a>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                     <div class="card-body">
                        <div class="progress-widget">
                              <div class="rounded p-3 bg-soft-dack">
                                 <i class="fa fa-users"></i>
                              </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Recetas</p>
                              <h4 class="counter">$150K</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                     <div class="card-body">
                        <div class="progress-widget">
                              <div class="rounded p-3 bg-soft-warning">
                                 <i class="fa fa-users"></i>
                              </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Eventos</p>
                              <h4 class="counter">$4600</h4>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div> 
   </div>
    <div class="row">
      <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <div id="calendar1" class="calendar-s"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
