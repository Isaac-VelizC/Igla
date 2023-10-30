@extends('layouts.app')

@section('content')
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1 style="color: black">Nuevo Curso</h1>
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
                                      <label class="form-label" for="fname">Nombre:</label>
                                      <input type="text" class="form-control" id="fname" placeholder="Nombre">
                                      </div>
                                      <div class="form-group">
                                        <label class="form-label" for="exampleFormControlSelect2">Seleccionar Aula</label>
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
                                        <label class="form-label" for="exampleFormControlSelect2">seleccionar Modulo</label>
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
                                        <label class="form-label" for="exampleInputcolor">Input Color </label>
                                        <input type="color" class="form-control" id="exampleInputcolor" value="#50b5ff">
                                    </div>
                                  </div>
                              </div>
                          </div>
                           <button type="submit" class="btn btn-primary">Guardar Curso</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
