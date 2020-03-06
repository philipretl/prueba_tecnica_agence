<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">

      <ul class="nav nav-primary">
        <li class="nav-section  col-12">
          <a href="@yield('home')" class="btn btn-primary btn-block">
            <i class="fas fa-chart-pie"></i>
            &nbsp Administrador

          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Administrador</h4>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Zonas</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Zonas</span>
                </a>
              </li>
              <li>
                <a href="{{route('crear_zona')}}">
                  <span class="sub-item">Crear Zona</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-address-card"></i>
            <p>Encargados de Zona</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{route('listar_encargados')}}">
                  <span class="sub-item">Listar Encargados</span>
                </a>
              </li>
              <li>
                <a href="{{route('crear_encargado')}}">
                  <span class="sub-item">Crear Encargado</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Encargado Zona</h4>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#gastos">
            <i class="fas fa-cart-plus"></i>
            <p>Gastos</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="gastos">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Gastos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Crear Gastos</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#vendedores">
            <i class="icon-user-following"></i>
            <p>Vendedores</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="vendedores">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Vendedores</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Crear Vendedor</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Asignar presupuesto del dia</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#diasTrabajo">
            <i class="fas fa-briefcase"></i>
            <p>Dias de trabajo</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="diasTrabajo">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Dias Trabajo</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Crear Dia Trabajo</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Vendedor</h4>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#clientes">
            <i class="icon-user-following"></i>
            <p>Clientes</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="clientes">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Clientes</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Crear Clientes</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#prestamos">
            <i class="fas fa-dollar-sign"></i>
            <p>Prestamos</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="prestamos">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Prestamos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Crear Prestamos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Listar Abonos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Agregar Abono</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-toggle="collapse" href="#liquidaciones">
            <i class="fas fa-calculator"></i>
            <p>Presupuestos</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="liquidaciones">
            <ul class="nav nav-collapse">
              <li>
                <a href="#">
                  <span class="sub-item">Listar Presupuestos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Listar Liquidaciones</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
