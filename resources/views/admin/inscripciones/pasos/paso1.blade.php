<div class="col-xl-12 col-lg-12">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Información del Estudiante</h4>
       </div>
    </div>
    <div class="card-body">
       <div class="new-user-info">
          <form class="needs-validation" novalidate method="POST" action="{{ route('admin.inscripcion.store') }}">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="fname">Nombres:</label>
                            <input type="text" class="form-control" id="fname" name="nombre" placeholder="Nombres" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="lname">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="lname" name="ap_pat" placeholder="Apellidos">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="lname">Apellido Materno:</label>
                            <input type="text" class="form-control" id="lname" name="ap_mat" placeholder="Apellidos">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="cname">Cedula de Identidad:</label>
                            <input type="text" class="form-control" id="cname" name="ci" placeholder="Cedula de Identidad" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="cname">Fecha Nacimiento:</label>
                            <input type="date" class="form-control" id="cname" name="fNac" placeholder="Fecha Nacimiento" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="form-label">Genero:</label>
                            <select name="genero" class="selectpicker form-control" data-style="py-0" required>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="add1">Dirección:</label>
                            <input type="text" class="form-control" id="add1" name="direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="mobno">Numero Celular:</label>
                            <input type="text" class="form-control" id="mobno" name="telefono" placeholder="Numero de Celular">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">E mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <h5 class="mb-3">Información de Contacto</h5>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="nomb">Nombre:</label>
                            <input type="text" class="form-control" id="nomb" name="nombreC" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="apePC">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apPC" name="ap_patC" placeholder="Paterno">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="apeMC">Apellido Materno:</label>
                            <input type="text" class="form-control" id="apMC" name="ap_matC" placeholder="Materno">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="ciC">Cedular de Identidad:</label>
                            <input type="text" class="form-control" id="ciC" name="ciC" placeholder="Cedular de Identidad" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="numcelC">Numero de Celular:</label>
                            <input type="text" class="form-control" id="numcelC" name="telefonoC" placeholder="Numero de Celular" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="form-label">Genero:</label>
                            <select name="generoC" class="selectpicker form-control" data-style="py-0" required>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="emailC">Correo Electronico:</label>
                            <input type="text" class="form-control" id="emailC" name="emailC" placeholder="Correo Electronico">
                        </div>
                    </div>
                </div>
            </div>
             <button type="submit" class="btn btn-primary">Inscribir Estudiante</button>
          </form>
       </div>
    </div>
</div>