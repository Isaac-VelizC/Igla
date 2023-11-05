<div class="modal fade" id="modal_horario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Horario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.guardar-horario')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="hora-name" class="col-form-label">Horario:</label>
                        <input type="text" class="form-control" name="horarios" id="hora-name">
                    </div>
                    <div class="mb-3">
                        <label for="inicio-name" class="col-form-label">Hora Inico:</label>
                        <input type="time" class="form-control" name="horaInicio" id="inicio-name">
                    </div>
                    <div class="mb-3">
                        <label for="fin-name" class="col-form-label">Hora Fin:</label>
                        <input type="time" class="form-control" name="horaFin" id="fin-name">
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