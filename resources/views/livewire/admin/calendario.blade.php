<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tipos de Eventos</h4>
            </div>
        </div>
    </div>
    <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="header-title">
                        <h4 class="card-title">Tipo de Evento</h4>
                    </div>
                </div>
               <form action="">
                 @csrf
                  <div class="form-group">
                     <label class="form-label" for="pass">Nombre:</label>
                     <input type="nombre" class="form-control" wire:model="pass" required>
                  </div>
                  <div class="form-group">
                     <label class="form-label">backgroundColor:</label>
                     <input type="color" class="form-control" wire:model="backgroundColor" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">textColor:</label>
                    <input type="color" class="form-control" wire:model="textColor">
                 </div>
                  <button type="submit" class="btn btn-primary">Guardar</button>
               </form>
         </div>
    </div>
</div>