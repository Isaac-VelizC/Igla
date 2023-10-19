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
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <span class="item-name">Inicio</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                      <i class="fa fa-users" aria-hidden="true"></i>
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
                      <i class="icon">
                          <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z" fill="currentColor"></path>
                              <path d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z" fill="currentColor"></path>
                          </svg>
                      </i>
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
                      <i class="fa fa-file"></i>
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
                      <i class="icon">
                      <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
                      <path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
                      </svg>
                      </i>
                      <span class="item-name">Inventario</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link "  href="../../dashboard/admin.html">
                    <i class="icon">
                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
                    <path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
                    </svg>
                    </i>
                    <span class="item-name">Recetas</span>
                </a>
              </li>
              <li><hr class="hr-horizontal"></li>
              <li class="nav-item">
                  <a class="nav-link" href="https://templates.iqonic.design/hope-ui/html/dist/#accordion">
                      <i class="icon">
                           <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                         <path opacity="0.4" d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z" fill="currentColor"></path>                                <path d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z" fill="currentColor"></path>                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z" fill="currentColor">
                         </path></svg> 
                      </i>
                      <span class="item-name">Publicaciones</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://templates.iqonic.design/hope-ui/html/dist/#accordion">
                    <i class="icon">
                         <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                       <path opacity="0.4" d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z" fill="currentColor"></path>                                <path d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z" fill="currentColor"></path>                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z" fill="currentColor">
                       </path></svg> 
                    </i>
                    <span class="item-name">Archivos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://templates.iqonic.design/hope-ui/html/dist/#accordion">
                    <i class="fa fa-sliders"></i>
                    <span class="item-name">Acerca De</span>
                </a>
              </li>
          </ul>
        </div>
  </div>
  <div class="sidebar-footer"></div>
</aside>   