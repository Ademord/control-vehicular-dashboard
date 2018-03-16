
<nav class="navbar navbar-dark bg-inverse">
  <div class="container">
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
    <a class="navbar-brand" href="/">Control Vehicular</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/lugar">Lugar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/camara">Camara</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/miembro">Propietarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/matricula">Matriculas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
          <a class="dropdown-item" href="/reportes/coincidencias/lugar">Coincidencias por Lugar</a>
          <a class="dropdown-item" href="/reportes/coincidencias/propietario">Coincidencias por Propietario</a>
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
          <a class="dropdown-item" href="{{{ route('reportes.fake_coincidencias') }}}" >Generar Coincidencias Falsas</a>
          <a class="dropdown-item" href="{{{ route('reportes.fake_propietarios') }}}" >Generar Propietarios Falsos</a>
          <a class="dropdown-item" href="{{{ route('reportes.empty_database') }}}" >Vaciar Base de Datos</a>
        </div>
      </li>
    </ul>
    </div>
  </div>
</nav>