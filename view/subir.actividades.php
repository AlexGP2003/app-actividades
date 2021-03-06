<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir actividad</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">
    <!--SWEETALERT-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<body class="b_registro">
    <?php
      //Miramos la variable error, si esta seteada miramos el numero de error
      session_start();
    if (!(isset($_SESSION['user'])) || !isset($_REQUEST['Id'])){
        header("Location: ../index.html"); 
    }
  if (isset($_GET['err'])){
    if($_GET['err']==1){
      echo "<script>Swal.fire({
        title: 'Error',
        text: 'Faltan Datos',
        icon: 'error',
        confirmButtonText: 'Continuar'
      })</script>";
    }
    elseif($_GET['err']==2){
        echo "<script>Swal.fire({
          title: 'Error',
          text: 'La imagen no es jpg/jpeg',
          icon: 'error',
          confirmButtonText: 'Continuar'
        })</script>";
    }
    else{
      echo "<script>Swal.fire({
        title: 'Error',
        text: 'La imagen no se ha podido subir al servidor',
        icon: 'error',
        confirmButtonText: 'Continuar'
      })</script>";
      }
  }
  ?>
  <!--Menu Subir Actividad-->
    <div class="Centrado">
    <h2 class="s_index padding-m">Crea la actividad</h1>

        <form action="../logic/subir.actividades.logic.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="nombre" class="form-label">Nombre de la actividad</label>
            <input type="text" class="form-control recolocarform" name="nombre" placeholder="A??ade el nombre de la actividad" required>
          </div>
         
          <div class="mb-3">
          <label for="desc" class="form-label">Descripci??n de la actividad</label>
            <input type="text" class="form-control recolocarform" name="desc" placeholder="A??ade la descripci??n de la actividad" required>
          </div>
         
          <div class="mb-3">
          <label for="dur" class="form-label">Duraci??n de la actividad</label>
            <input type="text" class="form-control recolocarform" name="dur" placeholder="A??ade la duraci??n estimada de la actividad" required>
</div>
          
          <div class="mb-3">
            <label for="img" class="form-label">Imagen de la actividad</label>
            <input type="file" class="form-control recolocarform" name="img" required>
          </div>
          <div class="mb-3">
          <div class="column-2">
          <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="Publica">
           <label class="form-check-label" for="flexCheckDefault">
            Publica
            </label>
</div>
          <div class="column-2 br_boton">
          <label for="topic" class="form-label">T??pico</label>
            <select  name="topic" class="" required>                   
                <option value="1">Informatica</option>
                <option value="2">Matematicas</option>
            </select>
          </div>
          </div>
          <br>
          <br>
          <br>
          <div class="column-2">
          <button type="submit" class="btn btn-secondary " name="Crear">Crear</button>
          </div>
          <div class="column-2">
          <a href="./actividades.php" type="button" class="btn btn-secondary br_boton">Volver</a>
          </div>
          <br>
          <input type="hidden" name="Id" value=<?php echo $_REQUEST['Id']?>>
          </form>
        </div>
</body>
</html>