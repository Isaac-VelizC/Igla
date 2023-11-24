<style>
    .adjuntar {
    outline: 0;
    opacity: 0;
    pointer-events: none;
    user-select: none;
    }

    .label {
    width: 120px;
    border: 2px dashed grey;
    border-radius: 5px;
    display: block;
    padding: 1.2em;
    transition: border 300ms ease;
    cursor: pointer;
    text-align: center;
    }
    .label i {
    display: block;
    font-size: 42px;
    padding-bottom: 16px;
    }
    .label i,
    .label .title {
    color: grey;
    transition: 200ms color;
    }
    .label:hover {
    border: 2px solid black;
    }
    .label:hover i,
    .label:hover .title {
    color: black;
    }
</style>
<div class="accordion-item">
    <div id="collapseOne" class="accordion-collapse collapse {{ $AD1 ? 'show' : '' }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <p></p>
                <div class="d-flex align-items-center flex-wrap">
                    <button type="button" class="btn btn-secondary btn-sm" wire:click='guardarTarea({{$idTarea}})'>Guardar</button>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseOne" wire:click='cancelarTarea({{$idTarea}})'>x</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <form id="tareaForm1">
                        @csrf
                        <input type="hidden" wire:model="idTarea">
                        <div class="card">
                            <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Titulo</label>
                                <input type="text" class="form-control" wire:model="tarea.titulo">
                                @error('tarea.titulo') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instrucciones (Opcional)</label>
                                <textarea class="form-control" name='descripcionTarea' id="editorPregunta1"></textarea>
                            </div>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <form wire:submit.prevent='updatedFiles' id="tareaForm3">
                                            <input type="hidden" id="tarea_id_form3" wire:model="tarea_id" value="{{ $idTarea ?? '' }}">
                                            <label class="label">
                                                <span class="title">Adjuntar</span>
                                                <input type="file" class="adjuntar" wire:model='files' multiple />
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="card-body">
                                    @if ($filesTarea)
                                        @foreach ($filesTarea as $file)
                                            <ol class="list-group list-group-numbered">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">{{ $file->nombre }}</div>
                                                        {{ $file->fecha }}
                                                    </div>
                                                    <span class="badge rounded-pill bg-light text-dark" wire:click='eliminarFile({{$file->id}})'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <path d="M9 13v6c0 .552-.448 1-1 1s-1-.448-1-1v-6c0-.552.448-1 1-1s1 .448 1 1zm7-1c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1s1-.448 1-1v-6c0-.552-.448-1-1-1zm4.333-8.623c-.882-.184-1.373-1.409-1.189-2.291l-5.203-1.086c-.184.883-1.123 1.81-2.004 1.625l-5.528-1.099-.409 1.958 19.591 4.099.409-1.958-5.667-1.248zm4.667 4.623v16h-18v-16h18zm-2 14v-12h-14v12h14z"/>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ol>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form id="tareaForm2">
                                @csrf
                                <input type="hidden" wire:model="idTarea">
                                <div class="row">
                                    <div class="form-group col-md-12 d-flex">
                                        @if ($tipoTrabajo->count() > 0)
                                            @foreach ($tipoTrabajo as $item)
                                                <div class="form-check d-block">
                                                    <label class="form-check-label">{{ $item->nombre }}</label>
                                                    <input class="form-check-input" type="radio" wire:model='tarea.tipo' value="{{ $item->id }}" required style="margin-right: 5px; margin-left: 5px;">
                                                </div>
                                            @endforeach
                                        @else
                                            <option value="">No hay tipos de trabajos</option>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model='tarea.con_nota' onchange="toggleNotaInput('tareaNotaInput', this)">
                                            <label class="form-check-label">Agregar Nota</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="text" id="tareaNotaInput" class="form-control" wire:model='tarea.nota' placeholder="Ingrese un valor" style="display: none;" required>
                                            @error('tarea.nota') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>                             
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Fecha Limite (Opcional)</label>
                                        <input type="date" class="form-control" wire:model="tarea.fin" min="{{ date('Y-m-d') }}">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tareaNotaInput = document.getElementById('tareaNotaInput');
        ajustarValor();
        function ajustarValor() {
            const valor = tareaNotaInput.value.trim();
            if (valor.value === '' || Number(valor) === 0 || isNaN(valor)) {
                tareaNotaInput.value = 100;
            }
        }
        tareaNotaInput.addEventListener('blur', function () {
            ajustarValor();
        });
    });    
</script>
