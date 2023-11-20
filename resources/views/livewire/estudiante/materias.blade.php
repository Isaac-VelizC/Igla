<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-body">
        <div class="new-user-info">
            <div class="row">
                @if ($materias->count() > 0)
                    @foreach ($materias as $item)
                        <div class="col-lg-4 col-md-12">
                            <div @if(optional($item->cursoDocentes)->where('estado', true)->isNotEmpty())
                                wire:click="seleccionarMateria({{ $item->id }})"
                            @else
                                style="background-color: rgba(0, 0, 0, 0.5);"
                            @endif style="background-color: {{ $item->color }}; cursor: pointer;" class="card">
                                <div class="card-body">
                                    <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 h6" style="color: black;">{{ $item->nombre }}</p>
                                        </div>
                                        <div class="dropdown">
                                            <p class="h6"><span class="badge bg-light text-dark">0</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">No hay materias</p>
                @endif
            </div>
        </div>
    </div>

    @if ($showModal)
        <input type="checkbox" id="my-modal-toggle" class="my-modal-toggle" checked>
        <div class="my-modal-container">
            <div class="my-modal">
                @if ($materiaSeleccionada)
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $materiaSeleccionada->nombre }}</h5>
                        <button type="button" class="btn-close" wire:click="cerrarModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p>{{ $materiaSeleccionada->descripcion }}</p>
                            <ul class="nav nav-pills">
                                @foreach ($horarios as $hora)
                                    <li class="nav-item" style="cursor: pointer;">
                                        <button class="nav-link {{ $tabActiva == $hora->id ? 'active' : '' }}"
                                            aria-current="page" wire:click="cursos({{ $materiaSeleccionada->id }}, '{{ $hora->id }}')">
                                            {{ $hora->turno }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                            @if ($tabActiva)
                                <div class="row">
                                    @foreach ($cursosActivos as $mat)
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span><b>Docente: {{ $mat->docente->persona->nombre }}</b></span>
                                                            <div class="mt-2"><p>Horario: {{ $mat->horario->turno }}</p></div>
                                                        </div>
                                                        @if ($estadoEst)
                                                            <div wire:click='programarMateria({{$mat->id}})'><span class="badge bg-primary">Programar</span></div>
                                                        @else
                                                            <div wire:click='borrarProgramacion({{$mat->id}})'><span class="badge bg-danger">Quitar</span></div>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div><span>Aula:{{ $mat->aula->nombre }}</span></div>
                                                        <div><span>Cupos: 0 / {{ $mat->aula->capacidad }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center">
                                    <p>Selecciona un horario para ver la información correspondiente.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <p>Selecciona una materia para ver la información correspondiente.</p>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
