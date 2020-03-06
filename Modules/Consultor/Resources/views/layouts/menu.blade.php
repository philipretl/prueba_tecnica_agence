@section('items')

  <li class="nav-section">
    <span class="sidebar-mini-icon">
      <i class="fa fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Agence</h4>
  </li>

  <li class="nav-item">
    <a data-toggle="collapse" href="#base">
      <i class="fas fa-layer-group"></i>
      <p>Agence</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="base">
      <ul class="nav nav-collapse">
        <li>
          <a href="{{route('consultor.dashboard')}}">
            <span class="sub-item">Consultor</span>
          </a>
        </li>
        <li>
          <a href="">
            <span class="sub-item">Cliente</span>
          </a>
        </li>

      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a data-toggle="collapse" href="#sidebarLayouts">
      <i class="fas fa-address-card"></i>
      <p>Proyectos</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="sidebarLayouts">
      <ul class="nav nav-collapse">
        <li>
          <a href="">
            <span class="sub-item">ver</span>
          </a>
        </li>

      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a data-toggle="collapse" href="#administrativos">
      <i class="fas fa-info-circle"></i>
      <p>Administrativos</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="administrativos">
      <ul class="nav nav-collapse">
        <li>
          <a href="">
            <span class="sub-item">ver</span>
          </a>
        </li>

      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a data-toggle="collapse" href="#comercial">
      <i class="fas fa-archive"></i>
      <p>Comercial</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="comercial">
      <ul class="nav nav-collapse">
        <li>
          <a href="">
            <span class="sub-item">Ver</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a data-toggle="collapse" href="#financiero">
      <i class="fas fa-dollar-sign"></i>
      <p>Financiero</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="financiero">
      <ul class="nav nav-collapse">
        <li>
          <a href="">
            <span class="sub-item">Ver</span>
          </a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a data-toggle="collapse" href="#usuario">
      <i class="fas fa-laugh-beam"></i>
      <p>Usuario</p>
      <span class="caret"></span>
    </a>
    <div class="collapse" id="usuario">
      <ul class="nav nav-collapse">
        <li>
          <a href="">
            <span class="sub-item">Ver</span>
          </a>
        </li>
      </ul>
    </div>
  </li>

@endsection
