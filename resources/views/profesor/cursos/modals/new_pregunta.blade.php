<div class="accordion-item">
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <form wire:submit.prevent="formPregunta">
                @csrf
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                       <div class="card">
                          <div class="card-body">
                            <div class="form-group">
                               <label class="form-label">Titulo</label>
                               <input type="text" class="form-control" wire:model="titulo">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instrucciones (Opcional)</label>
                                <textarea class="form-control" wire:model='descripcionPregunta' id="editorPregunta2"></textarea>
                            </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="fname">Puntos:</label>
                                        <input type="text" class="form-control" wire:model="pregunta.nota" placeholder="sin Nota" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="ap_pat">Fecha Limite:</label>
                                        <input type="text" class="form-control" wire:model="pregunta.limite" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Dejar de recivir archivos despues de la fecha limite</label>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="form-label">Tema:</label>
                                        <select class="selectpicker form-control" wire:model="pregunta.tema" required>
                                            <option selected>Sin Tema</option>
                                            <option value="Hombre">Hombre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>