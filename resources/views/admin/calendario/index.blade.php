@extends('layouts.app')

@section('content')
    <div class="position-relative iq-banner">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1 style="color: black">Gestionar Calendario</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          <!-- Nav Header Component End -->
      <!--Nav End-->
    </div>

    <div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
  <div class="row">
      <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Eventos</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p>
                <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
            </div>
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                      <h4 class="card-title">Nuevo Evento</h4>
                  </div>
              </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label">Calegoria</label>
                            <select class="form-select form-select-sm mb-3 shadow-none">
                                <option selected="">Abra este menú de selección</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control form-select-sm" id="nombre1">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="descipcion">Descripcion</label>
                            <textarea type="text" class="form-control" id="descipcion"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
          </div>
      </div>
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Calendario</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div id="calendar1" class="calendar-s"></div>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection