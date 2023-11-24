<div class="accordion-item">
    <div id="collapseTwo" class="accordion-collapse collapse {{ $AD2 ? 'show' : '' }}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <form wire:submit.prevent="guardarPregunta">
                @csrf
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <p></p>
                    <div class="d-flex align-items-center flex-wrap">
                        <button type="submit" class="btn btn-secondary btn-sm" wire:click='guardarTarea({{$idTarea}})'>Guardar</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseTwo" wire:click='resetearForm'>x</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                       <div class="card">
                          <div class="card-body">
                            <div class="form-group">
                               <label class="form-label">Pregunta</label>
                               <textarea class="form-control" wire:model="pregunta.pregunta" required></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model='pregunta.con_nota' onchange="toggleNotaInput('preguntaNotaInput', this)">
                                        <label class="form-check-label" >Agregar Nota</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="text" id="preguntaNotaInput" class="form-control" wire:model='pregunta.nota' placeholder="Ingrese un valor" style="display: none;" required>
                                        @error('pregunta.nota') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Fecha Limite (Opcional)</label>
                                    <input  type="date" class="form-control" wire:model="pregunta.limite" max="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="form-label">Tema:</label>
                                    <select class="selectpicker form-control" wire:model="pregunta.tema">
                                        <option value="" selected>Sin Tema</option>
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
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const preguntaNotaInput = document.getElementById('preguntaNotaInput');
        ajustarValor();
        function ajustarValor() {
            const valor = preguntaNotaInput.value.trim();
            if (valor.value === '' || Number(valor) === 0 || isNaN(valor)) {
                preguntaNotaInput.value = 100;
            }
        }
        preguntaNotaInput.addEventListener('blur', function () {
            ajustarValor();
        });
    });    
</script>
