<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!--BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/main.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body class="b_registro">
  <?php
  if (isset($_GET['error'])){
    if($_GET['error']==1){
        echo "<script>Swal.fire({
          title: 'Error',
          text: 'Usuario ya insertado',
          icon: 'error',
          confirmButtonText: 'Continuar'
        })</script>";
    }
    elseif($_GET['error']==2){
      echo "<script>Swal.fire({
        title: 'Error',
        text: 'Las contraseñas no coinciden',
        icon: 'error',
        confirmButtonText: 'Continuar'
      })</script>";
    }
    else{
      echo "<script>Swal.fire({
        title: 'Error',
        text: 'Faltan campos por rellenar',
        icon: 'error',
        confirmButtonText: 'Continuar'
      })</script>";
      }
  }
  ?>
<div class="Centrado">
<form action="../logic/checkuser.logic.php" method="POST">
    <h1>Regístrate</h1>
  <div class="mb-3">
    <label for="mail" class="form-label">Correo</label>
    <input type="email" class="form-control recolocarform" name="mail" aria-describedby="emailHelp" placeholder="Introduce el correo" required>
  </div>
  <div class="mb-3">
    <label for="user" class="form-label">Usuario</label>
    <input type="text" class="form-control recolocarform" name="user" placeholder="Introduce el nombre de usuario" required>
  </div>
  <div class="mb-3">
    <label for="pass1" class="form-label">Contraseña</label>
    <input type="password" class="form-control recolocarform" name="pass1" placeholder="Introduce la contraseña" required>
  </div>
  <div class="mb-3">
    <label for="pass2" class="form-label">Repite la contraseña</label>
    <input type="password" class="form-control recolocarform" name="pass2" placeholder="Repite la contraseña" required>
  </div>
  <br>
  <div class="column-2">
  <button type="submit" class="btn btn-secondary" name="Enviar">Regístrate</button>
  </div>
  <div class="column-2">
  <a href="../index.html" type="button" class="btn btn-secondary">Volver</a>
  </div>
  <br>
  </form>
</div>

</body>
</html>