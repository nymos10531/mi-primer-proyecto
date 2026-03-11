<?php
 include_once '../lib/helpers.php';
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fondoimagen.css">
  
  <title>Login</title>
  <style>
    .input-group-text {
      cursor: pointer;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <div class="card col-md-4 mx-auto mt-5 shadow-lg">
      <div class="card-body bg-primary-subtle rounded">
        <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>

        <form action="<?php echo getUrl("Acceso","Acceso","login"); ?>" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="docum">Documento</label>
            <input type="text" class="form-control" name="docum" id="docum" placeholder="Ingrese documento" required>
          </div>

          <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
          </div>

          <div class="form-group mt-3">
            <label for="role">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
              <option value="">Seleccione su rol</option>
              <option value="1">Administrador</option>
              <option value="2">Optometra</option>
            </select>
          </div>
          
          <div class="form-group mt-4 text-center">
            <button type="submit" class="btn btn-primary w-100" name="login">Continuar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-info mt-4">
                        <?php echo htmlspecialchars($_GET['msg']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>