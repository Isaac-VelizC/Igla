@extends('layouts.app')

@section('content')

<div class="iq-navbar-header" style="height: 215px;">
  <div class="container-fluid iq-container">
      <div class="row">
          <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                      <h1 style="color: black">Informacion del Instituto</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Informacion de Presentación </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="position-relative">
                            <label class="form-label" for="icono">Icono</label>
                            <img id="img2" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                            <label class="upload-icone bg-primary">
                                    <input class="file-upload" type="file" name="file1" id="customFile" accept="image/*">
                                    <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                        <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                            </label>
                        </div>
                        <br>
                        <div class="position-relative">
                            <label class="form-label" for="presentacion">Presentación</label>
                            <img id="img1" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="portada" class="theme-color-default-img rounded portada-300">
                            <label class="upload-icone-portada bg-primary">
                                    <input class="file-upload" type="file" name="file1" id="customFile2" accept="image/*">
                                    <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                        <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputNombre">Nombre del Instituto </label>
                            <input type="text" class="form-control" id="exampleInputNombre" value="" name="nombre">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputTitulo">Mensaje de Bienvenida </label>
                            <input type="text" class="form-control" id="exampleInputTitulo" value="" name="titulo">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputSub1">Subititulo 1</label>
                            <input type="text" class="form-control" id="exampleInputSub1" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputSub2">Subititulo 2</label>
                            <input type="text" class="form-control" id="exampleInputSub2" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlDesc1">Descripción 1</label>
                            <textarea class="form-control" id="exampleFormControlDesc1" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlDesc2">descripción 2</label>
                            <textarea class="form-control" id="exampleFormControlDesc2" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Información de Contacto y Ubicación</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p>Información de la empresa para que el cliente pueda contactarse</p>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="telefono">Telefono:</label>
                            <div class="col-sm-9">
                            <input type="tel" class="form-control" id="telefono" placeholder="Numero de Telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Correo:</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="email1" placeholder="Correo Electronico">
                            </div>
                        </div>
                            <input type="hidden" class="form-control" id="lat" name="latitud">
                            <input type="hidden" class="form-control" id="long" name="longitud">
                        <div class="form-group row" style="width: 100%; height: 150px; margin-top: 25px;">
                            <label class="form-label" for="email">Ubicación:</label>
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="width: 100%;"></iframe>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Redes Sociales</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label" for="facebook">Facebook Url:</label>
                            <input type="url" class="form-control" name="facebook" placeholder="Facebook Url" id="facebook">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="youtube">YouTube Url:</label>
                            <input type="url" class="form-control" name="youtube" placeholder="YouTube Url" id="youtube">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="instagram">Instagram Url:</label>
                            <input type="url" class="form-control" name="instagram" placeholder="Instagram Url" id="instagram">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="twitter">Twitter Url:</label>
                            <input type="url" class="form-control" name="twitter" placeholder="Twitter Url" id="twitter">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="linkedin">Linkedin Url:</label>
                            <input type="url" class="form-control" name="linkedin" placeholder="Linkedin Url" id="linkedln">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
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

@endsection