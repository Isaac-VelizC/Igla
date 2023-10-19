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
     <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">
           <div class="overflow-hidden d-slider1 ">
              <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Total de Usuarios</p>
                             <h4 class="counter">{{ $users->count() }}</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Estudiantes</p>
                             <h4 class="counter">{{ $estudiantes->count() }}</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Docentes</p>
                             <h4 class="counter">{{ $docentes->count() }}</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Materias</p>
                             <h4 class="counter">$742K</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-05" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Cursos</p>
                             <h4 class="counter">$150K</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-06" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Inscripciones</p>
                             <h4 class="counter">$4600</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-07" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                             <svg class="card-slie-arrow icon-24 " width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Eventos</p>
                             <h4 class="counter">11.2M</h4>
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
                  <div class="card  ">
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
