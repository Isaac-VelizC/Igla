<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Formulario del {{ $formType ? 'Docente' : 'Personal' }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate method="POST" action="{{ $formType ? route('store.docentes') : route('admin.personal.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="fname">Nombre de docente:</label>
                                    <input type="text" class="form-control" id="fname" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre" required>
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="ap_pat">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="ap_pat" name="ap_pat" value="{{ old('paterno') }}" placeholder="Apellido Paterno">
                                    @error('ap_pat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="ap_mat">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="ap_mat" name="ap_mat" value="{{ old('materno') }}" placeholder="Apellido Materno">
                                    @error('ap_mat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="ci">Cedula de Identidad:</label>
                                    <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci') }}" placeholder="Cedula de Identidad" required>
                                    @error('ci')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">Genero:</label>
                                    <select name="genero" class="selectpicker form-control" data-style="py-0">
                                        <option>Seleccionar Genero</option>
                                        <option value="Hombre" {{ old('genero') }}>Hombre</option>
                                        <option value="Mujer" {{ old('genero') }}>Mujer</option>
                                    </select>
                                    @error('genero')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="mobno">Numero Celular:</label>
                                    <input type="text" class="form-control" id="mobno" name="telefono" value="{{ old('telefono') }}" placeholder="Numero de Celular">
                                    @error('telefono')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="email">E mail:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="E mail" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="position-relative">
                                            <img id="img" src="{{ asset('imagenes/fondo_blanco.jpg') }}" alt="icono" class="theme-color-default-img rounded avatar-100">
                                            <label class="upload-icone bg-primary">
                                                    <input class="file-upload" type="file" name="perfil" id="customFile" accept="image/*">
                                                    <svg class="upload-button icon-14" width="14"  viewBox="0 0 24 24">
                                                        <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                            </label>
                                        </div>
                                    </div>
                                    @error('perfil')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if ($formType)
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="fcontratado">Fecha Contratado:</label>
                                        <input type="date" class="form-control" id="fcontratado" name="contrato" max="{{ date('Y-m-d') }}" value="{{ old('contrato') }}">
                                        @error('contrato')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="horas">Horas de Trabajo:</label>
                                        <input type="number" class="form-control" id="horas" name="horas" value="{{ old('horas') }}">
                                        @error('horas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else                             
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="rol">Rol:</label>
                                        <input type="number" class="form-control" id="rol" name="rol" value="{{ old('rol') }}">
                                        @error('rol')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelButton" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var image = document.getElementById('img')
    var input = document.getElementById('customFile')
    input.addEventListener('change', (e) => {
        image.src = URL.createObjectURL(e.target.files[0]);
    });

    document.getElementById('cancelButton').addEventListener('click', function () {
        var form = document.querySelector('form.needs-validation');
        var inputElements = form.querySelectorAll('input, select');
        inputElements.forEach(function (element) {
            if (element.tagName === 'SELECT') {
                element.value = 'Seleccionar Genero';
            } else {
                element.value = '';
            }
        });
    });
</script>