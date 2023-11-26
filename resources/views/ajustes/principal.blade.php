@extends('layouts.app')

@section('content')

<style>
    /* Aplica una animación de desvanecimiento al elemento alert */
.alert-fade {
    animation: fadeOut 5s; /* Ajusta la duración de la animación según tus necesidades */
}

/* Define la animación de desvanecimiento */
@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
        display: none;
    }
}
</style>    

<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                      <h1 style="color: black">Informacion del Instituto</h1>
                  </div>
                    @if(session('success'))
                        <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
              </div>
          </div>
      </div>
  </div>
</div>

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">                
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">Informacion de Presentación </h4>
                            </div>
                        </div>
                        <br>
                        <form class="needs-validation" novalidate method="POST" action="{{ $informacion ? route('admin.actualizar-registro', ['id' => $informacion->id]) : route('admin.guardar-registro') }}" enctype="multipart/form-data">
                            @csrf
                            @if($informacion)
                                @method('PUT')
                            @endif
                          <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="card-body">
                                    <div class="position-relative">
                                        <label class="form-label" for="icono">Icono</label>
                                        @if ($informacion && $informacion->icono)
                                            <img id="img2" src="{{ asset($informacion->icono) }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                                        @else
                                            <img id="img2" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                                        @endif
                                        <label class="upload-icone bg-primary">
                                        <input class="file-upload" type="file" name="file1" id="customFile" accept="image/*">
                                            <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                            </svg>
                                        </label>
                                    </div><br>
                                    <div class="position-relative">
                                        <label class="form-label" for="presentacion">Presentación</label>
                                        @if ($informacion && $informacion->imagen1)
                                            <img id="img1" src="{{ asset($informacion->imagen1) }}" alt="portada" class="theme-color-default-img rounded portada-300">
                                        @else
                                            <img id="img1" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="portada" class="theme-color-default-img rounded portada-300">
                                        @endif
                                        <label class="upload-icone-portada bg-primary">
                                                <input class="file-upload" type="file" name="file2" id="customFile2" accept="image/*">
                                                <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                    <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                </svg>
                                        </label>
                                    </div><br>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleInputNombre">Nombre del Instituto </label>
                                        <input type="text" class="form-control" id="exampleInputNombre" required value="{{ $informacion ? old('nombre', $informacion->nombre) : '' }}" name="nombre">
                                        <div class="invalid-tooltip">Es necerario que ingrese el nombre del instituto</div>
                                    </div>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleInputTitulo">Mensaje de Bienvenida </label>
                                        <input type="text" class="form-control" id="exampleInputTitulo" value="{{ $informacion ? old('titulo', $informacion->titulo) : '' }}" name="titulo" required>
                                        <div class="invalid-tooltip">Por favor ingrese un Mensaje corto</div>
                                    </div>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleInputSub1">Subititulo 1</label>
                                        <input type="text" class="form-control" id="exampleInputSub1" value="{{ $informacion ? old('sub1', $informacion->subtitulo1) : '' }}" name="sub1">
                                    </div>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleInputSub2">Subititulo 2</label>
                                        <input type="text" class="form-control" id="exampleInputSub2" value="{{ $informacion ? old('sub2', $informacion->subtitulo2) : '' }}" name="sub2">
                                    </div>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleFormControlDesc1">Descripción 1</label>
                                        <textarea class="form-control" id="exampleFormControlDesc1" rows="5" name="descrip1">{{ $informacion ? old('descrip1', $informacion->descripcion1) : '' }}</textarea>
                                    </div>
                                    <div class="position-relative">
                                        <label class="form-label" for="exampleFormControlDesc2">descripción 2</label>
                                        <textarea class="form-control" id="exampleFormControlDesc2" rows="5" name="descrip2">{{ $informacion ? old('descrip2', $informacion->descripcion2) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Redes Sociales</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="facebook">Facebook Url:</label>
                                        <input type="url" class="form-control" value="{{ $informacion ? old('facebook', $informacion->facebook) : '' }}" name="facebook" placeholder="Facebook Url" id="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="youtube">YouTube Url:</label>
                                        <input type="url" class="form-control" value="{{ $informacion ? old('youtube', $informacion->youtube) : '' }}" name="youtube" placeholder="YouTube Url" id="youtube">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="instagram">Instagram Url:</label>
                                        <input type="url" class="form-control" value="{{ $informacion ? old('instagram', $informacion->instagram) : '' }}" name="instagram" placeholder="Instagram Url" id="instagram">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="twitter">Twitter Url:</label>
                                        <input type="url" class="form-control" value="{{ $informacion ? old('twitter', $informacion->twitter) : '' }}" name="twitter" placeholder="Twitter Url" id="twitter">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="linkedin">Linkedin Url:</label>
                                        <input type="url" class="form-control" value="{{ $informacion ? old('linkedin', $informacion->linkedin) : '' }}" name="linkedin" placeholder="Linkedin Url" id="linkedln">
                                    </div>
                                </div>
                                
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Información de Contacto y Ubicación</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Información de la empresa para que el cliente pueda contactarse</p>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="telefono">Telefono:</label>
                                        <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="telefono" placeholder="Numero de Telefono" value="{{ $informacion ? old('telefono', $informacion->telefono) : '' }}" name="telefono">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Correo:</label>
                                        <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email1" placeholder="Correo Electronico" name="email" value="{{ $informacion ? old('email', $informacion->correo) : '' }}">
                                        </div>
                                    </div>
                                        <input type="hidden" class="form-control" id="lat" name="latitud" {{ $informacion ? old('latitud', $informacion->latitud) : '' }}>
                                        <input type="hidden" class="form-control" id="long" name="longitud" {{ $informacion ? old('longitud', $informacion->longitud) : '' }}>
                                    <div class="form-group row" style="width: 100%; height: 150px; margin-top: 25px;">
                                        <label class="form-label" for="email">Ubicación:</label>
                                        <div class="gmap_canvas">
                                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="width: 100%;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">{{ $informacion ? 'Actualizar' : 'Guardar' }}</button>
                          <button type="button" class="btn btn-danger">Cancelar</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var image = document.getElementById('img1')
    var input = document.getElementById('customFile2')
    input.addEventListener('change', (e) => {
        image.src = URL.createObjectURL(e.target.files[0]);
    });

    var imageIcono = document.getElementById('img2')
    var inputIcono = document.getElementById('customFile')
    inputIcono.addEventListener('change', (e) => {
        imageIcono.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
<script>
    setTimeout(function() {
        document.getElementById('myAlert').classList.add('d-none');
    }, 5000);
</script>

@endsection