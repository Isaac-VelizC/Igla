<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
  <div class="sidebar-header d-flex align-items-center justify-content-start">
      <a href="{{ route('admin.home') }}" class="navbar-brand">
          <div class="logo-main">
              <div class="logo-normal">
                  <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                  </svg>
              </div>
              <div class="logo-mini">
                  <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                  </svg>
              </div>
          </div>
          <h4 class="logo-title">IGLA</h4>
      </a>
      <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
          <i class="icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
          </i>
      </div>
  </div>
  <div class="sidebar-body pt-0 data-scrollbar">
      <div class="sidebar-list">
          <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
              <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('admin.home') }}">
                      <i class="bi bi-house"></i>
                      <span class="item-name">Inicio</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                      <i class="bi bi-people"></i>
                      <span class="item-name">Usuarios</span>
                      <i class="right-icon">
                          <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                      </i>
                  </a>
                  <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('admin.users') }}">
                            <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                            <i class="sidenav-mini-icon"> H </i>
                            <span class="item-name"> Todos los Usuarios </span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('admin.estudinte') }}">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> D </i>
                              <span class="item-name">Estudiantes</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('admin.docentes') }}">
                              <i class="icon svg-icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> D </i>                   
                              <span class="item-name">Docentes</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('admin.personal') }}">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> B </i>
                              <span class="item-name">Personal</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth" role="button" aria-expanded="false" aria-controls="sidebar-user">
                      <i class="bi bi-bookshelf"></i>
                      <span class="item-name">Materias</span>
                      <i class="right-icon">
                          <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                      </i>
                  </a>
                  <ul class="sub-nav collapse" id="sidebar-auth" data-bs-parent="#sidebar-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="../../dashboard/auth/sign-in.html">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> L </i>
                              <span class="item-name">Crear</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../dashboard/auth/sign-up.html">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> R </i>
                              <span class="item-name">Lista</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                      <i class="bi bi-journal-check"></i>
                      <span class="item-name">Reportes</span>
                      <i class="right-icon">
                          <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                      </i>
                  </a>
                  <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                      <li class="nav-item">
                          <a class="nav-link " href="../../dashboard/app/user-profile.html">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> U </i>
                              <span class="item-name">Estudiantes</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="../../dashboard/app/user-add.html">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> A </i>
                              <span class="item-name">Calificaciones</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="../../dashboard/app/user-list.html">
                              <i class="icon">
                                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                      <g>
                                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                      </g>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> U </i>
                              <span class="item-name">Asistencias</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link "  href="../../dashboard/admin.html">
                        <i class="bi bi-basket"></i>
                        <span class="item-name">Inventario</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link "  href="../../dashboard/admin.html">
                    <i class="bi bi-journals"></i>
                    <span class="item-name">Recetas</span>
                </a>
              </li>
              <li><hr class="hr-horizontal"></li>
              <li class="nav-item">
                  <a class="nav-link" href="https://templates.iqonic.design/hope-ui/html/dist/#accordion">
                        <i class="bi bi-postcard"></i>
                        <span class="item-name">Publicaciones</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://templates.iqonic.design/hope-ui/html/dist/#accordion">
                    <i class="bi bi-archive"></i>
                    <span class="item-name">Archivos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ajustes') }}">
                    <i class="bi bi-sliders"></i>
                    <span class="item-name">Acerca De</span>
                </a>
              </li>
          </ul>
        </div>
  </div>
  <div class="sidebar-footer"></div>
</aside>   