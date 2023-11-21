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
                    <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>