<div class="modal fade" id="modal_aula_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Aula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.actualizar-aula', ['id' => $aula->id]) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="aula_id" id="aula_id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $aula ? old('nombre', $aula->nombre) : '' }}" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Codigo:</label>
                        <input type="text" class="form-control" name="codigo" value="{{ $aula ? old('codigo', $aula->codigo) : '' }}" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Capacidad:</label>
                        <input type="text" class="form-control" name="capacidad" value="{{ $aula ? old('capacidad', $aula->capacidad) : '' }}" id="recipient-name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
