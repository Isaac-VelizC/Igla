<div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Informacion del Contacto</h4>
    </div>
</div>
<div class="card-body">
    <div class="new-user-info">
        <form class="needs-validation" novalidate method="POST" id="formHabilitarDesabilitar" action="{{ route('update.contacto', $contac->id) }}">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="form-label" for="fname">Nombre del Familiar:</label>
                    <input type="text" class="form-control" id="fname" name="nombre" value="{{ $contac->persona->nombre }}" placeholder="Nombre" required>
                </div>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-md-6">
                    <label class="form-label" for="ap_pat">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="ap_pat" name="ap_pat" value="{{ $contac->persona->ap_paterno }}" placeholder="Apellido Paterno">
                </div>
                @error('ap_pat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-md-6">
                    <label class="form-label" for="ap_mat">Apellido Materno:</label>
                    <input type="text" class="form-control" id="ap_mat" name="ap_mat" value="{{ $contac->persona->ap_materno }}" placeholder="Apellido Materno">
                </div>
                @error('ap_mat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-md-6">
                    <label class="form-label" for="ci">Cedula de Identidad:</label>
                    <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci', $contac->persona->ci ) }}" placeholder="Cedula de Identidad" required>
                </div>
                @error('ci')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-6">
                    <label class="form-label">Genero:</label>
                    <select name="genero" class="selectpicker form-control" data-style="py-0" id="generoSelect" required>
                        <option>Seleccionar Genero</option>
                        <option value="Hombre" {{ old('genero', $contac->persona->genero == 'Hombre' ? 'selected' : '') }}>Hombre</option>
                        <option value="Mujer" {{ old('genero', $contac->persona->genero == 'Mujer' ? 'selected' : '') }}>Mujer</option>
                    </select>
                </div>
                @error('genero')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-md-6">
                    <label class="form-label" for="mobno">Numero Celular:</label>
                    <input type="text" class="form-control" id="mobno" name="telefono" value="{{ old('telefono', $num ? $num->numero_tel : '') }}" placeholder="Numero de Celular" required>
                </div>
                @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-md-6">
                    <label class="form-label" for="email">E mail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email',  $contac->persona->email) }}" placeholder="E mail">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-danger" >Cancelar</button>
        </form>
    </div>
</div>