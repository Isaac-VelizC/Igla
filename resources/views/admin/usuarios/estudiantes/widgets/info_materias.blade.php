<div class="card-body">
    <div class="new-user-info">
        <div class="row">
            @if ($materias->count() > 0)
                @foreach ($materias as $item)
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">{{ $item->curso->nombre }}</p>
                                    </div>
                                    <div class="dropdown">
                                        <span class="h5" id="dropdownMenuButton11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon-24" xmlns="http://www.w3.org/2000/svg" width="24"  viewBox="0 0 24 24" fill="none">
                                                <g>
                                                <g>
                                                <circle cx="7" cy="12" r="1" fill="black"/>
                                                <circle cx="12" cy="12" r="1" fill="black"/>
                                                <circle cx="17" cy="12" r="1" fill="black"/>
                                                </g>
                                                </g>
                                            </svg>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton11" style="">
                                            <a class="dropdown-item" href="#">
                                                <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7366 2.76175H8.08455C6.00455 2.75375 4.29955 4.41075 4.25055 6.49075V17.3397C4.21555 19.3897 5.84855 21.0807 7.89955 21.1167C7.96055 21.1167 8.02255 21.1167 8.08455 21.1147H16.0726C18.1416 21.0937 19.8056 19.4087 19.8026 17.3397V8.03975L14.7366 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                                <path d="M14.4741 2.75V5.659C14.4741 7.079 15.6231 8.23 17.0431 8.234H19.7971" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                                <path d="M14.2936 12.9141H9.39355" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                                <path d="M11.8442 15.3639V10.4639" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                Registrar Pago
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                Programar Pago
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#showMateria{{ $item->id }}" >
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h2 class="counter">{{$item->aula->capacidad}}</h2>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px;">
                                        <div class="progress-bar" style="background-color: {{ $item->curso->color }};" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @include('admin.usuarios.estudiantes.widgets.materia_show', ['modalId' => $item->id])
                @endforeach
            @else
                <p class="text-center">No hay materias</p>
            @endif
        </div>
    </div>
</div>