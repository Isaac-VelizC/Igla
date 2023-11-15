@extends('profesor.cursos.curso')
@section('curso')
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
                         @if (!$curso->photo)
                            <img src="{{ asset($curso->photo) }}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                         @else
                            <img src="{{ asset('imagenes/user.jpg') }}" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                         @endif
                      </div>
                   </div>
                   <div class="form-group">
                      <ul class="list-group list-group-flush">
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Docente</div>
                            <span>{{ $curso->docente->persona->nombre }} {{$curso->docente->persona->ap_paterno}} {{$curso->docente->persona->ap_materno}}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Materia</div>
                            <span>{{ $curso->curso->nombre }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Horario</div>
                            <span>{{ $curso->horario->turno }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Aula</div>
                            <span>{{ $curso->aula->nombre }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Fecha Inicio</div>
                            <span>{{ $curso->fecha_ini }}</span>
                         </li>
                         <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="fw-bold">Fecha Fin</div>
                            <span>{{ $curso->fecha_fin }}</span>
                         </li>
                      </ul>
                   </div>
               </div>
            </div>
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
                              <div class="fw-bold"></div>
                              <a href="{{ asset($item->archivo) }}" target="_blank"><span>Ver</span></a>
                           </li>
                        @endforeach
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
                     <h4 class="card-title">Subir Archivos al curso</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route("materia.doc.configuracion", [$curso->id]) }}"
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
              <div class="card-body">
                 <form method="POST" action="{{route('uploads')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="description"></textarea>
                     </div>
                     @if ($errors->has('description'))
                       <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                     <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
              </div>
            </div>
        </div>
   </div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
@endsection
