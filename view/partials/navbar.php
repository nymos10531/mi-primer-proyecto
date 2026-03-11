<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(87, 109, 176);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <i class="fas fa-glasses"></i> Bienvenidos a la Optica Sena
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <i class="fas fa-home"></i> Inicio
          </a>
        </li>
        <li class="nav-item dropdown">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bars"></i> Menú
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="<?php echo getUrl('pacientes', 'pacientes', 'getCreate'); ?>">
                <i class="fas fa-user-plus"></i> Registrar Paciente
              </a></li>
              <li><a class="dropdown-item" href="<?php echo getUrl('pacientes', 'pacientes', 'list'); ?>">
                <i class="fas fa-users"></i> Consultar Pacientes
              </a></li>
              <li><a class="dropdown-item" href="<?php echo getUrl('historias', 'historias', 'list'); ?>">
                <i class="fas fa-file-medical"></i> Consultar Historias
              </a></li>
            </ul>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <?php
          $nombreRol = '';
          if (isset($_SESSION['rol'])) {
              if ($_SESSION['rol'] == 1) {
                  $nombreRol = 'Administrador';
              } elseif ($_SESSION['rol'] == 2) {
                  $nombreRol = 'Optometra';
              } 
          }
          ?>
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i> <?php echo @$SESSION['nombre']; ?>yeraldin trejos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo getUrl('Acceso', 'Acceso', 'logout'); ?>">
              <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>