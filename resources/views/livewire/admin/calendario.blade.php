<div class="row">    
    <div class="col-sm-12 col-lg-4"  id='external-events'>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Eventos</h4>
                </div>
            </div>
            <div class="card-body">
                <div id='external-events'>
                    <p>
                      <strong>Draggable Events</strong>
                    </p>
                  
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                      <div class='fc-event-main'>My Event 1</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                      <div class='fc-event-main'>My Event 2</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                      <div class='fc-event-main'>My Event 3</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                      <div class='fc-event-main'>My Event 4</div>
                    </div>
                    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                      <div class='fc-event-main'>My Event 5</div>
                    </div>
                  
                    <p>
                      <input type='checkbox' id='drop-remove' />
                      <label for='drop-remove'>remove after drop</label>
                    </p>
                  </div>
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
                            <option selected="">Seleccionar Categoria</option>
                            @foreach ($categorias as $item)
                                <option value="1">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" class="form-control form-select-sm" wire:model="nombre">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="descipcion">Descripcion</label>
                        <textarea type="text" class="form-control" wire:model="descripcion"></textarea>
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
            <div class="card-body" wire:ignore>
                <div id="calendar1" class="calendar-s"></div>
            </div>
        </div>
    </div>
</div>