<div>
    <div class="card-body">
        <div class="new-user-info">
            <div class="row">
                @if ($materias->count() > 0)
                    @foreach ($materias as $item)
                        <div class="col-lg-4 col-md-12">
                            <div @if(optional($item->cursoDocentes)->where('estado', true)->isNotEmpty())
                                data-bs-placement="top" data-bs-toggle="modal" data-bs-target="#materias-{{$item->id}}"
                            @else
                                style="background-color: rgba(0, 0, 0, 0.5);"
                            @endif style="background-color: {{ $item->color }};" class="card">
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
    
@foreach ($materias as $item)
<div id="materias-{{$item->id}}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

        <div class="modal-dialog" style="max-height: calc(100vh - 20px); margin-top: 10px; margin-bottom: 10px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $item->nombre }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p>{{ $item->descripcion }}</p>
                        <div class="bd-example">
                            <ul class="nav nav-pills">
                                @foreach ($horarios as $hora)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $tabActiva == $hora->turno ? 'active' : '' }}"
                                           aria-current="page"
                                           wire:click="cursos({{$item->id}}, '{{ $hora->id }}')">
                                           {{ $hora->turno }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @if ($tabActiva)
                                <div class="row">
                                    @foreach ($cursosActivos as $curso)
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span><b>Revenue</b></span>
                                                            <div class="mt-2">
                                                                <h2 class="counter">$35000</h2>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge bg-primary">Monthly</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <div>
                                                            <span>Total Revenue</span>
                                                        </div>
                                                        <div>
                                                            <span>35%</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                                                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="">
                                    <p>Selecciona un horario para ver la información correspondiente.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Programar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>