@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Estudiante {{$estudiante->nombre}} {{$estudiante->ap_paterno}} {{$estudiante->ap_materno}}</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> 

<div class="conatiner-fluid content-inner mt-n5 py-0">
    @if(session('success'))
       <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
           <span>{{ session('success') }}</span>
           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
   @endif
    <div>
       <div class="row">
          <div class="col-xl-3 col-lg-4">
             <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <div class="profile-img-edit position-relative">
                        @if ($estudiante->photo)
                            <img src="{{ asset($estudiante->photo) }}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                        @else
                            <img src="{{ asset('imagenes/user.jpg')}}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                        @endif
                        </div>
                     </div>
                      <div class="form-group">
                         <label class="form-label">Roles De Usuario:</label>
                         <select name="type" class="selectpicker form-control" data-style="py-0" disabled>
                           @foreach($estudiante->user->getRoleNames()->toArray() as $role)
                              <option>{{ $role }}</option>
                           @endforeach
                         </select>
                      </div>
                   <form method="POST" action="{{ route('cambiar.password.estudiante', $estudiante->user_id) }}">
                     @csrf
                     @method('PUT')
                      <div class="form-group">
                         <label class="form-label" for="pass">Contraseña:</label>
                         <input type="password" class="form-control" name="pass" id="pass" placeholder="***********">
                      </div>
                      <div class="form-group">
                         <label class="form-label" for="passConfirm">Confirmar Contraseña:</label>
                         <input type="password" class="form-control" name="passConfirm" id="passConfirm" placeholder="***********">
                      </div>
                      @if ($errors->has('passConfirm'))
                        <span class="text-danger">{{ $errors->first('passConfirm') }}</span>
                     @endif
                      <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                   </form>
                </div>
             </div>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="bd-example">
                        <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="home" aria-selected="true">Estudiante</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Contacto</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="contact" aria-selected="false">Cursos</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
                                @include('admin.usuarios.estudiantes.widgets.info_estud')
                            </div>
                            <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab1">
                                @include('admin.usuarios.estudiantes.widgets.info_contac')
                            </div>
                            <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab1">
                                <p>cursos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formulario = document.getElementById('formHabilitarDesabilitar');
        const editarBtn = document.getElementById('editarBtn');
        const guardarBtn = document.getElementById('guardarBtn');
        const cancelarBtn = document.getElementById('cancelarBtn');
        const generoSelect = document.getElementById('generoSelect');
        const campos = formulario.querySelectorAll('input');
        // Función para habilitar o deshabilitar todos los campos y el select
        function habilitarDesabilitarCampos(habilitar) {
            campos.forEach(function (campo) {
                campo.disabled = !habilitar;
            });
            generoSelect.disabled = !habilitar;
            editarBtn.style.display = habilitar ? 'none' : 'block';
            guardarBtn.style.display = habilitar ? 'block' : 'none';
            cancelarBtn.style.display = habilitar ? 'block' : 'none';
        }
        // Manejar eventos de clic
        editarBtn.addEventListener('click', function () {
            habilitarDesabilitarCampos(true); // Habilitar
        });
        cancelarBtn.addEventListener('click', function () {
            habilitarDesabilitarCampos(false); // Deshabilitar al cancelar
        });
        // El formulario está deshabilitado inicialmente
        habilitarDesabilitarCampos(false);
    });
</script>
    
    
@endsection