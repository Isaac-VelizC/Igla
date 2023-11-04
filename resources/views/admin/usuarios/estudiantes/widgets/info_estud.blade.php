<div class="card-header d-flex justify-content-between">
    <div class="header-title">
        <h4 class="card-title">Informacion del Estudiante</h4>
    </div>
</div>
<div class="card-body">
    <div class="new-user-info">
        <form class="needs-validation" novalidate method="POST" id="formHabilitarDesabilitar" action="{{ route('update.estudiantes', $est->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-12">
                <label class="form-label" for="fname">Nombre de estudiante:</label>
                <input type="text" class="form-control" id="fname" name="nombre" value="{{ $estudiante->nombre }}" placeholder="Nombre" required>
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="ap_pat">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ap_pat" name="ap_pat" value="{{ $estudiante->ap_paterno }}" placeholder="Apellido Paterno">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="ap_mat">Apellido Materno:</label>
                <input type="text" class="form-control" id="ap_mat" name="ap_mat" value="{{ $estudiante->ap_materno }}" placeholder="Apellido Materno">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="ci">Cedula de Identidad:</label>
                <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci', $estudiante->ci ) }}" placeholder="Cedula de Identidad" required>
            </div>
            <div class="form-group col-sm-6">
                <label class="form-label">Genero:</label>
                <select name="genero" class="selectpicker form-control" data-style="py-0" id="generoSelect" required>
                    <option>Seleccionar Genero</option>
                    <option value="Hombre" {{ old('genero', $estudiante->genero == 'Hombre' ? 'selected' : '') }}>Hombre</option>
                    <option value="Mujer" {{ old('genero', $estudiante->genero == 'Mujer' ? 'selected' : '') }}>Mujer</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="mobno">Numero Celular:</label>
                <input type="text" class="form-control" id="mobno" name="telefono" value="{{ old('telefono',  $estudiante->numTelefono->numero_tel) }}" placeholder="Numero de Celular">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="email">E mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email',  $estudiante->email) }}" placeholder="E mail" required>
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="fnac">Fecha Nacimiento:</label>
                <input type="date" class="form-control" id="fnac" name="fnac" value="{{ old('fnac', $est->fecha_nacimiento ) }}">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label" for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $est->direccion ) }}" placeholder="Dirección">
            </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary" id="editarBtn">Editar</button>
            <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-success" id="guardarBtn" style="display: none;">Guardar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" id="cancelarBtn" style="display: none;">Cancelar</button>
            </div>
            </div>
        </form>
    </div>
</div>