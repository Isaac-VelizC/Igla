@extends('layouts.app')

@section('content')
<div class="position-relative iq-banner">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                     <div>
                        <h1 style="color: black">Administrar</h1>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-md-12 col-lg-12">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">Modulos</h4>
            </div>
         </div>
          <div class="row row-cols-1">
             <div class="overflow-hidden d-slider1 ">
                <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                     <div class="card-body">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal_modulo">
                             <div class="progress-widget">
                                 <div class="rounded p-4 bg-soft-warning">
                                    <i class="fa fa-plus"></i>
                                 </div>
                                <div class="progress-detail">
                                  <h3>Nuevo Modulo</h3>
                                </div>
                             </div>
                        </a>
                     </div>
                  </li>
                  @if ($modulos->count() > 0)
                     @foreach ($modulos as $modulo)
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                           <div class="card-body">
                              <a type="button" data-bs-toggle="modal" data-bs-target="#modal_modulo_edit" data-modulo-id="{{ $modulo ? $modulo->id : '' }}">
                                 <div class="progress-widget">
                                    <div class="rounded p-4 bg-soft-warning">
                                       <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="progress-detail">
                                       <p  class="mb-2">{{ $modulo->nombre }}</p>
                                       <h4 class="counter">{{ $modulo->costo }}</h4>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </li>
                     @endforeach
                  @endif
                </ul>
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
             </div>
          </div>
      </div> 
      @if ($modulos->count() > 0)
         @include('admin.administracion.modal_modulo_edit')
      @endif
      @include('admin.administracion.modal_modulo')
      <div class="col-md-12 col-lg-12">
         <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Aulas</h4>
               </div>
         </div>
         <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
               <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                     <div class="card-body">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal_aula">
                           <div class="progress-widget">
                              <div class="rounded p-4 bg-soft-warning">
                                 <i class="fa fa-plus"></i>
                              </div>
                              <div class="progress-detail">
                                 <h3>Nuevo Aula</h3>
                              </div>
                           </div>
                        </a>
                     </div>
                  </li>
                  @if ($aulas->count() > 0)
                     @foreach ($aulas as $aula)
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                           <div class="card-body">
                              <a type="button" data-bs-toggle="modal" data-bs-target="#modal_aula_edit" data-aula-id="{{ $aula ? $aula->id : '' }}">
                                 <div class="progress-widget">
                                    <div class="rounded p-4 bg-soft-warning">
                                       <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="progress-detail">
                                       <p  class="mb-2">{{ $aula->nombre }} {{ $aula->codigo }}</p>
                                       <h4 class="counter">{{ $aula->capacidad }}</h4>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </li>
                     @endforeach
                  @endif
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div>
      @if ($aulas->count() > 0)
         @include('admin.administracion.modal_aula_edit')
      @endif
      @include('admin.administracion.modal_aula')
      <div class="col-md-12 col-lg-12">
         <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Horarios</h4>
               </div>
            </div>
         <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
               <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                     <div class="card-body">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modal_horario">
                           <div class="progress-widget">
                                 <div class="rounded p-4 bg-soft-warning">
                                    <i class="fa fa-plus"></i>
                                 </div>
                              <div class="progress-detail">
                                 <h3>Nuevo Horario</h3>
                              </div>
                           </div>
                        </a>
                     </div>
                  </li>
                  @if ($horarios->count() > 0)
                     @foreach ($horarios as $hora)
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                           <div class="card-body">
                              <a type="button" data-bs-toggle="modal" data-bs-target="#modal_horario_edit" data-hora-id="{{ $hora ? $hora->id : '' }}">
                                 <div class="progress-widget">
                                    <div class="rounded p-4 bg-soft-warning">
                                       <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="progress-detail">
                                       <p  class="mb-2">{{ $hora->horarios }}</p>
                                       <h6>{{ $hora->inicio }} - {{ $hora->fin }}</h6>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </li>
                     @endforeach
                  @endif
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div> 
      @if ($horarios->count() > 0)
         @include('admin.administracion.modal_horario_edit')
      @endif
      @include('admin.administracion.modal_horario')
      <div class="col-md-12 col-lg-12">
         <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Metodos de Pago</h4>
               </div>
            </div>
         <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
               <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
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
                     <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                        <div class="card-body">
                           <a type="button" data-bs-toggle="modal" data-bs-target="#modal_pago">
                              <div class="progress-widget">
                                    <div class="rounded p-4 bg-soft-warning">
                                       <i class="fa fa-plus"></i>
                                    </div>
                                 <div class="progress-detail">
                                    <h3>Nuevo Metodo</h3>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </li>
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div> 
      @include('admin.administracion.modal_pago')
      <div class="col-md-12 col-lg-12">
         <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Categorias de Eventos</h4>
               </div>
            </div>
         <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
               <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
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
                     <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                        <div class="card-body">
                           <a type="button" data-bs-toggle="modal" data-bs-target="#modal_evento">
                              <div class="progress-widget">
                                    <div class="rounded p-4 bg-soft-warning">
                                       <i class="fa fa-plus"></i>
                                    </div>
                                 <div class="progress-detail">
                                    <h3>Nueva Categoria</h3>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </li>
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div> 
      @include('admin.administracion.modal_event')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

<script>
   $(document).on('click', '[data-bs-toggle="modal"]', function () {
      var aulaId = $(this).data('aula-id');
      var horaId = $(this).data('hora-id');
      var moduloId = $(this).data('modulo-id');
      
      if (aulaId !== undefined) {
         $('#aula_id').val(aulaId);
      }
      
      if (horaId !== undefined) {
         $('#hora_id').val(horaId);
      }
      
      if (moduloId !== undefined) {
         $('#modulo_id').val(moduloId);
      }
   });
</script>

@endsection