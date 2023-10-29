<div class="position-relative iq-banner">
  <!--Nav Start-->
  <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">
      <a href="../../dashboard/index.html" class="navbar-brand">
          <div class="logo-main">
              <div class="logo-normal">
                <img src="{{ asset('imagenes/igla.svg')}}" alt="logo" height="35">
              </div>
              <div class="logo-mini">
                <img src="{{ asset('imagenes/igla.svg')}}" alt="logo" height="35">
              </div>
          </div>
          <!--logo End-->
          <h4 class="logo-title">IGLA</h4>
      </a>
      <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
          <i class="icon">
           <svg  width="20px" class="icon-20" viewBox="0 0 24 24">
              <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
          </svg>
          </i>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <span class="mt-2 navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
          <li class="nav-item dropdown">
            <a href="#"  class="nav-link" id="notification-drop" data-bs-toggle="dropdown" >
                <i class="bi bi-bell"></i>
                <span class="bg-danger dots"></span>
            </a>
            <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                <div class="m-0 shadow-none card">
                  <div class="py-3 card-header d-flex justify-content-between bg-primary">
                      <div class="header-title">
                        <h5 class="mb-0 text-white">Todas las Notificaciones</h5>
                      </div>
                  </div>
                  <div class="p-0 card-body">
                      <a href="#" class="iq-sub-card">
                        <div class="d-flex align-items-center">
                            <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../../assets/images/shapes/01.png" alt="">
                            <div class="ms-3 w-100">
                              <h6 class="mb-0 ">Emma Watson Bni</h6>
                              <div class="d-flex justify-content-between align-items-center">
                                  <p class="mb-0">95 MB</p>
                                  <small class="float-end font-size-12">Just Now</small>
                              </div>
                            </div>
                        </div>
                      </a>
                  </div>
                </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-envelope"></i>
              <span class="bg-primary count-mail"></span>
            </a>
            <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="mail-drop">
                <div class="m-0 shadow-none card">
                  <div class="py-3 card-header d-flex justify-content-between bg-primary">
                      <div class="header-title">
                        <h5 class="mb-0 text-white">Todos los Mensajes</h5>
                      </div>
                  </div>
                  <div class="p-0 card-body ">
                      <a href="#" class="iq-sub-card">
                        <div class="d-flex align-items-center">
                            <div class="">
                              <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../../assets/images/shapes/01.png" alt="">
                            </div>
                            <div class="ms-3">
                              <h6 class="mb-0 ">Bni Emma Watson</h6>
                              <small class="float-start font-size-12">13 Jun</small>
                            </div>
                        </div>
                      </a>
                  </div>
                </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('assets2/images/avatars/01.png')}}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
              <div class="caption ms-3 d-none d-md-block ">
                <h6 class="mb-0 caption-title">{{ Auth::user()->name }}</h6>
                    @foreach(Auth::user()->getRoleNames()->toArray() as $role)
                      <p class="mb-0 caption-sub-title">{{ $role }}</p>
                    @endforeach
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('users.profile') }}"><i class="bi bi-person-circle"></i> Ver Perfil</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-bell"></i> Notificaciones</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.ajustes') }}"><i class="bi bi-gear"></i> Ajustes</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i> Salir 
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>