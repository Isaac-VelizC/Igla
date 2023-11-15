<div class="modal fade" id="showMateria{{$modalId}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showMateriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showMateriaLabel">{{ $item->curso->nombre }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="card-body">
                        <p>{{ $item->curso->descripcion }}</p>
                        <div class="mb-1">Docente: <a href="#" class="ms-3">{{ $item->docente->persona->nombre }} {{ $item->docente->persona->ap_paterno }}</a></div>
                        <div class="mb-1">Horario: {{ $item->horario->turno }}</div>
                        <div>Aula: <span class="ms-3">{{ $item->aula->nombre }}</span></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Programar</button>
            </div>
        </div>
    </div>
</div>
