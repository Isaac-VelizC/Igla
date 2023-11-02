@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: black">Dar de Alta el Curso</h1>
                    </div>
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
                               <h4 class="card-title">Información del Curso</h4>
                            </div>
                        </div>
                        <br>
                        <form>
                          <div class="row">
                              <div class="col-sm-12 col-lg-6">
                                  <div class="row">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlSelect2">Seleccionar Docente</label>
                                        <select multiple="" class="form-select" id="exampleFormControlSelect2">
                                        <option>select-1</option>
                                        <option>select-2</option>
                                        <option>select-3</option>
                                        <option>select-4</option>
                                        <option>select-5</option>
                                        <option>select-6</option>
                                        <option>select-7</option>
                                        <option>select-8</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlSelect2">Seleccionar Curso</label>
                                        <select multiple="" class="form-select" id="exampleFormControlSelect2">
                                        <option>select-1</option>
                                        <option>select-2</option>
                                        <option>select-3</option>
                                        <option>select-4</option>
                                        <option>select-5</option>
                                        <option>select-6</option>
                                        <option>select-7</option>
                                        <option>select-8</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check d-block">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">Mañana</label>
                                        </div>
                                        <div class="form-check d-block">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">Tarde</label>
                                        </div>
                                        <div class="form-check d-block">
                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                            <label class="form-check-label" for="flexRadioDisabled">Noche</label>
                                        </div>
                                        <div class="form-check d-block">
                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled" checked disabled>
                                            <label class="form-check-label" for="flexRadioCheckedDisabled">Sabado</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label class="form-label" for="cname">Cupos:</label>
                                      <input type="text" class="form-control" id="cname" placeholder="Cupos de Curso">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="exampleInputIni">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="exampleInputIni" value="2019-12-18">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="exampleInputFin">Fecha Fin</label>
                                            <input type="date" class="form-control" id="exampleInputFin" value="2019-12">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="exampleInputweek">Hora Inicio</label>
                                            <input type="time" class="form-control" id="exampleInputweek" value="2019-W46">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="exampleInputtime">Hora Fin</label>
                                            <input type="time" class="form-control" id="exampleInputtime" value="13:45">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlTextarea1">Descripción</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-sm-12 col-lg-6">
                                  <h5 class="mb-3">Imagen del Curso</h5>
                                  <div class="row">
                                        <div class="position-relative">
                                            <img id="img" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="portada" class="theme-color-default-img rounded portada-300">
                                            <label class="upload-icone-portada bg-primary">
                                                    <input class="file-upload" type="file" name="file1" id="customFile" accept="image/*">
                                                    <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                        <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                            </label>
                                        </div>
                                  </div>
                              </div>
                          </div>
                           <button type="submit" class="btn btn-primary">Habilitar</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var image = document.getElementById('img')
    var input = document.getElementById('customFile')
    input.addEventListener('change', (e) => {
        image.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
@endsection