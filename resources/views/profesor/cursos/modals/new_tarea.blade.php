<div class="accordion-item">
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseOne" onclick="cancelar()">Cancelar</button>
        <button type="submit" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseOne" onclick="guardar()">Guardar</button>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" wire:model="tarea.titulo">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Instrucciones (Opcional)</label>
                            <textarea class="form-control" wire:model='descripcionTarea' id="editorPregunta1"></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="card" wire:ignore>
                        <div class="card-body">
                            <div class="form-group">
                                <form action="/upload-target" class="dropzone" id="drop">
                                    <div class="dz-message needsclick">
                                        <p>Adjuntar Archivos</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Agregar Nota:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model='tarea.estadoNota' onchange="toggleNotaInput('tareaNotaInput', this)">
                                            <label class="form-check-label">Agregar Nota</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="text" id="tareaNotaInput" class="form-control" wire:model='tarea.nota' placeholder="Ingrese un valor" style="display: none;" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Fecha Limite (Opcional)</label>
                                        <input type="date" class="form-control" id="input1" wire:model="tarea.limite" onchange="mostrarOcultarElemento('input1', 'checkboxContainer1', 'checkbox1')"  min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3 form-check" id="checkboxContainer1" style="display: none;">
                                        <input type="checkbox" class="form-check-input" id="checkbox1">
                                        <label class="form-check-label">Dejar de recibir archivos después de la fecha límite</label>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="form-label">Tema:</label>
                                        <select class="selectpicker form-control" wire:model="tarea.tema" required>
                                            <option value="" selected>Sin Tema</option>
                                                @foreach ($temasCurso as $item)
                                                <option value="{{$item->id}}">{{ $item->tema }}</option>
                                                @endforeach
                                        </select>
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
<script src="{{ mix('js/form_tarea.js') }}"></script>
