<div class="modal fade" id="modal_modulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Modulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.guardar-modalidad')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-costo" class="col-form-label">Costo:</label>
                        <input type="text" class="form-control" name="costo" id="recipient-costo">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="DescripcionId">Descripción</label>
                        <textarea class="form-control" id="DescripcionId" rows="3" name="descrip"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>