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
                               <input type="text" class="form-control" wire:model="pregunta.titulo">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instrucciones (Opcional)</label>
                                <textarea class="form-control" wire:model='pregunta.descripcionPregunta' id="editorPregunta2"></textarea>
                            </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Agregar Nota:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model='pregunta.estadoNota' onchange="toggleNotaInput('preguntaNotaInput', this)">
                                            <label class="form-check-label" >Agregar Nota</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="text" id="preguntaNotaInput" class="form-control" wire:model='pregunta.nota' placeholder="Ingrese un valor" style="display: none;" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Fecha Limite (Opcional)</label>
                                        <input  type="date" class="form-control" wire:model="pregunta.limite" id="input2" onchange="mostrarOcultarElemento('input2', 'checkboxContainer2', 'checkbox2')"  min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3 form-check" id="checkboxContainer2" style="display: none;">
                                        <input type="checkbox" class="form-check-input" wire:model='pregunta.subidaLimite' id="checkbox2">
                                        <label class="form-check-label">Dejar de recibir archivos después de la fecha límite</label>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="form-label">Tema:</label>
                                        <select class="selectpicker form-control" wire:model="pregunta.tema" required>
                                            <option selected>Sin Tema</option>
                                            @foreach ($temasCurso as $item)
                                                <option value="{{$item->id}}">{{ $item->tema }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseTwo" wire:click='resetearForm'>Cancelar</button>
                 <button type="submit" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Guardar</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('agregarNotaCheckbox').addEventListener('change', function() {
        var notaInput = document.getElementById('notaInput');
        notaInput.style.display = this.checked ? 'block' : 'none';
        notaInput.value = this.checked ? '' : null; // Limpiar el valor si no está seleccionado
    });
</script>
