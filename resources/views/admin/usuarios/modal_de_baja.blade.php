<div class="modal fade" id="deleteConfirm{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Dar de Baja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro dar de baja usuario?
             </div>
             <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                   <form method="POST" action="{{ route('admin.' . $tipo . '.destroy', [$item->id]) }}">
                      @csrf
                      @method('DELETE')
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit" class="btn btn-danger">Confirmo</button>
                   </form>
             </div>
        </div>
    </div>
</div>