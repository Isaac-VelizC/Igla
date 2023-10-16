      <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
          <a href="index.html">
            <img src="assets/images/logo/logo.svg" alt="logo" />
          </a>
        </div>
        <nav class="sidebar-nav">
          <ul>
            <li class="nav-item">
              <a href="{{ route('admin.index') }}">
                <span class="icon">
                  <i class="lni lni-home"></i>
                </span>
                <span class="text">Inicio</span>
              </a>
            </li>
            <li class="nav-item nav-item-has-children">
              <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
                aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                  <i class="lni lni-users"></i>
                </span>
                <span class="text">Usuarios</span>
              </a>
              <ul id="ddmenu_1" class="collapse dropdown-nav">
                <li>
                  <a href="index.html"> Todos los Usuarios </a>
                </li>
                <li>
                  <a href="{{ route('admin.estudinte') }}"> Estudiante </a>
                </li>
                <li>
                  <a href="index.html"> Chef </a>
                </li>
                <li>
                  <a href="index.html"> Administrador </a>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-children">
              <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
                aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                  <i class="lni lni-apartment"></i>
                </span>
                <span class="text">Institucional</span>
              </a>
              <ul id="ddmenu_2" class="collapse dropdown-nav">
                <li>
                  <a href="index.html"> Cursos </a>
                </li>
                <li>
                  <a href="index.html"> Cursos y Chefs </a>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-children">
              <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
                aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                  <i class="lni lni-layers"></i>
                </span>
                <span class="text">Materias</span>
              </a>
              <ul id="ddmenu_3" class="collapse dropdown-nav">
                <li>
                  <a href="index.html"> Crear </a>
                </li>
                <li>
                  <a href="index.html"> Lista </a>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-children">
              <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
                aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon">
                  <i class="lni lni-agenda"></i>
                </span>
                <span class="text">Reportes</span>
              </a>
              <ul id="ddmenu_4" class="collapse dropdown-nav">
                <li>
                  <a href="index.html"> Estudiantes </a>
                </li>
                <li>
                  <a href="index.html"> Calificaciones </a>
                </li>
                <li>
                  <a href="index.html"> Asistencias </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                  <i class="lni lni-calculator"></i>
                </span>
                <span class="text">Inventario</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                  <i class="lni lni-chef-hat"></i>
                </span>
                <span class="text">Recetas</span>
              </a>
            </li>
            <span class="divider"><hr /></span>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                  <i class="lni lni-star-half"></i>
                </span>
                <span class="text">Publicaciones</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                  <i class="lni lni-image"></i>
                </span>
                <span class="text">Imagenes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                  <i class="lni lni-files"></i>
                </span>
                <span class="text">Archivos</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="tables.html">
                <span class="icon">
                    <i class="lni lni-cog"></i>
                </span>
                <span class="text">Ajustes</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>
      <div class="overlay"></div>
