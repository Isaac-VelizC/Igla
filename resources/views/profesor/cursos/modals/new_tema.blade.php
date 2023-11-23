<div class="accordion-item">
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <form wire:submit.prevent="formTema">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titulo del Tema</label>
                    <input type="text" class="form-control" wire:model='tema'>
                    @error('tema') <span class="form-text error">{{ $message }}</span> @enderror
                </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseThree" wire:click='resetearForm()'>Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseThree">Guardar</button>
            </form>
        </div>
    </div>
</div>
