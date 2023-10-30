@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Cursos</h1>
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
                   <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                      <div class="card-body">
                        <a href="{{ route('cursos.curso') }}">
                           <div class="progress-widget">
                              <div class="rounded p-3 bg-soft-warning">
                                 <i class="fa fa-users"></i>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Cursos</p>
                                 <h4 class="counter">$742K</h4>
                              </div>
                           </div>
                        </a>
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
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">Listado de cursos anteriores</h4>
                            </div>
                         </div>
                         <div class="card-body">
                            <div class="table-responsive">
                               <table id="datatable" class="table table-striped" data-toggle="data-table">
                                  <thead>
                                     <tr>
                                        <th>Nombre</th>
                                        <th>Aula</th>
                                        <th>Cupos</th>
                                        <th>Fecha Docente</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Estado</th>
                                        <th>Tags</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><p>item->name</p></td>
                                          <td>
                                            <p><a href="#0">$item->email</a></p>
                                          </td>
                                          <td>
                                            <p>(303)555 3343523</p>
                                          </td>
                                          <td>
                                            <p>UIdeck digital agency</p>
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
                                               <a data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar"  href="#">
                                                  <i class="bi bi-person-gear"></i>
                                               </a>
                                               <a data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"  href="#">
                                                  <i class="bi bi-eye"></i>
                                               </a>
                                               <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"  href="#">
                                                  <i class="bi bi-pen"></i>
                                               </a>
                                               <a data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar"  href="#">
                                                  <i class="bi bi-trash"></i>
                                               </a>
                                            </div>
                                          </td>
                                      </tr>
                                  </tbody>
                               </table>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection