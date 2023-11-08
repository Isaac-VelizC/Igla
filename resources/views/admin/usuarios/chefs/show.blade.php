@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1 style="color: black">Docente {{$docente->nombre}} {{$docente->ap_paterno}} {{$docente->ap_materno}}</h1>
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
                           <img src="{{ asset($docente->photo) }}" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                        </div>
                     </div>
                      <div class="form-group">
                         <label class="form-label">Roles De Usuario:</label>
                         <select name="type" class="selectpicker form-control" data-style="py-0" disabled>
                           @foreach($docente->user->getRoleNames()->toArray() as $role)
                              <option>{{ $role }}</option>
                           @endforeach
                         </select>
                      </div>
                   <form method="POST" action="{{ route('cambiar.password.docent', $docente->user_id) }}">
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
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Informacion del Docente</h4>
                   </div>
                </div>
                <div class="card-body">
                   <div class="new-user-info">
                      <form class="needs-validation" novalidate method="POST" id="formHabilitarDesabilitar" action="{{ route('update.docentes', $docente->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="fname">Nombre de docente:</label>
                                <input type="text" class="form-control" id="fname" name="nombre" value="{{ $docente->nombre }}" placeholder="Nombre" required>
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-6">
                                <label class="form-label" for="ap_pat">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="ap_pat" name="ap_pat" value="{{ $docente->ap_paterno }}" placeholder="Apellido Paterno">
                            </div>
                            @error('ap_pat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-6">
                                <label class="form-label" for="ap_mat">Apellido Materno:</label>
                                <input type="text" class="form-control" id="ap_mat" name="ap_mat" value="{{ $docente->ap_materno }}" placeholder="Apellido Materno">
                            </div>
                            @error('ap_mat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-12">
                                <label class="form-label" for="ci">Cedula de Identidad:</label>
                                <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci', $docente->ci ) }}" placeholder="Cedula de Identidad" required>
                            </div>
                            @error('ci')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-sm-12">
                                <label class="form-label">Genero:</label>
                                <select name="genero" class="selectpicker form-control" data-style="py-0" id="generoSelect">
                                    <option>Seleccionar Genero</option>
                                    <option value="Hombre" {{ old('genero', $docente->genero == 'Hombre' ? 'selected' : '') }}>Hombre</option>
                                    <option value="Mujer" {{ old('genero', $docente->genero == 'Mujer' ? 'selected' : '') }}>Mujer</option>
                                </select>
                            </div>
                            @error('genero')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-6">
                                <label class="form-label" for="mobno">Numero Celular:</label>
                                <input type="text" class="form-control" id="mobno" name="telefono" value="{{ old('telefono',  $docente->numTelefono->numero_tel) }}" placeholder="Numero de Celular">
                            </div>
                            @error('telefono')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-6">
                                <label class="form-label" for="email">E mail:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email',  $docente->email) }}" placeholder="E mail" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group col-md-6">
                                <label class="form-label" for="fcontratado">Fecha Contratado:</label>
                                <input type="date" class="form-control" id="fcontratado" name="contrato" value="{{ old('contrato', $docente->docente->contratado_en ) }}">
                            </div>    
                            @error('contrato')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                                    
                            <div class="form-group col-md-6">
                                <label class="form-label" for="horas">Horas de Trabajo:</label>
                                <input type="number" class="form-control" id="horas" name="horas" value="{{ old('horas', $docente->docente->max_hora_trabajos ) }}">
                            </div>
                            @error('horas')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         </div>
                         <hr>
                         <button type="button" class="btn btn-primary" id="editarBtn">Editar</button>
                         <div class="row">
                           <div class="col-6">
                               <button type="submit" class="btn btn-success" id="guardarBtn" style="display: none;">Guardar</button>
                           </div>
                           <div class="col-6">
                               <button type="button" class="btn btn-danger" id="cancelarBtn" style="display: none;">Cancelar</button>
                           </div>
                         </div>
                      </form>
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
        const valoresOriginales = {};
        campos.forEach(function (campo) {
            valoresOriginales[campo.name] = campo.value;
        });
        valoresOriginales['generoSelect'] = generoSelect.value;
        function restaurarValoresOriginales() {
            campos.forEach(function (campo) {
                campo.value = valoresOriginales[campo.name];
            });
            generoSelect.value = valoresOriginales['generoSelect'];
        }
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
            restaurarValoresOriginales();
            habilitarDesabilitarCampos(false);
        });
        habilitarDesabilitarCampos(false);
    });
</script>
    
    
    
@endsection