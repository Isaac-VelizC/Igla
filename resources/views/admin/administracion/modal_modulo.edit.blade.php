<div class="modal fade" id="modal_modulo_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Modulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.actualizar-modalidad', ['id' => $hora->id]) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="hora_id" id="hora_id" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Horario:</label>
                        <input type="text" class="form-control" name="horarios" value="{{ $hora ? old('horarios', $hora->horarios) : '' }}" id="recipient-name">
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
