<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Información de la Materia</h4>
                  </div>
            </div>
               <div class="card-body">
                   <div class="text-center">
                      <div class="user-profile position-relative">
                         @if ($materia->photo != null)
                            <img src="{{ asset($materia->photo) }}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                         @else
                            <img src="{{ asset('imagenes/user.jpg') }}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                         @endif
                      </div>
                   </div>
                   <div class="form-group">
                      <ul class="list-group list-group-flush">
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Docente</div>
                            <span>{{ $materia->docente->persona->nombre }} {{$materia->docente->persona->ap_paterno}} {{$materia->docente->persona->ap_materno}}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Materia</div>
                            <span>{{ $materia->curso->nombre }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Horario</div>
                            <span>{{ $materia->horario->turno }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Aula</div>
                            <span>{{ $materia->aula->nombre }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Fecha Inicio</div>
                            <span>{{ $materia->fecha_ini }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Fecha Fin</div>
                            <span>{{ $materia->fecha_fin }}</span>
                         </li>
                      </ul>
                   </div>
               </div>
            </div>
        </div>
        <div class="col-lg-8">
         @if(session('success'))
            <div id="myAlert" class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">
               <span>{{ session('success') }}</span>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif
         @if(session('error'))
            <div id="myAlert" class="alert alert-left alert-danger alert-dismissible fade show mb-3 alert-fade" role="alert">
               <span>{{ session('error') }}</span>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Subir Archivos al materia</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route("materia.doc.configuracion", [$materia->id]) }}"
                     method="POST"
                     class="dropzone"
                     id="my-awesome-dropzone">
                  </form>
               </div>
            </div>
            <div class="card">
              <div class="card-header">
                 <div class="header-title">
                    <h4 class="card-title">Mas Información de la Materia</h4>
                 </div>
              </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   <div class="header-title">
                      <h4 class="card-title">Archivos</h4>
                   </div>
                </div>
                <div class="card-body">
                   <div class="form-group">
                      <ul class="list-group list-group-flush">
                         @foreach ($files as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                               <div class="fw-bold">{{ $item->url }}</div>
                               <a href="{{ asset($item->url) }}" target="_blank"><span>Ver</span></a>
                            </li>
                         @endforeach
                      </ul>
                   </div>
                </div>
            </div>
        </div>
   </div>
</div>
