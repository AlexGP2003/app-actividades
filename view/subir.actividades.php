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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="./actividades.html">Actividades</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    //Comprobamos que la sesión está iniciada. 
                    session_start();
                    //Incluiremos el fichero de conexión 
                    include '../query/connection.php';
                    //Si lo esta y tiene establecida la variable de sesión usuario, le pondremos un boton para cerrar sesión que lo redirija a la lógica para cerrar sesión, sino uno de login que lo redirija al formulario del login
                    if (isset($_SESSION['user'])){
                        $sql3="SELECT Id FROM `usuario` WHERE usuario='{$_SESSION['user']}';";
                        $query3=mysqli_query($connection,$sql3);
                        $IdUser=mysqli_fetch_array($query3);
                        echo "<a href='./subir.actividades.php?Id=$IdUser[0]' class='btn btn-light form-control ms-1' type='button'><i class='fa-solid fa-arrow-up-from-bracket'></i></a>";
                        echo "<a href='../logic/cerrarsesion.logic.php' class='btn btn-light form-control ms-1' type='button'>Cerrar sesión</a>";
                    }else{
                        echo "<a href='./login.php' class='btn btn-light form-control ms-1' type='button'><i class='fa-solid fa-arrow-up-from-bracket'></i></a>";
                        echo "<a href='./login.php' class='btn btn-light form-control ms-1' type='button'>Acceder</a>";
                    }
                    ?>                
                </div>
            </div>
        </div>
    </nav>
    <?php
      //Miramos la variable error, si esta seteada miramos el numero de error
    if (!(isset($_SESSION['user'])) || !isset($_REQUEST['Id'])){
        header("Location: ./index.html"); 
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
            <input type="text" class="form-control recolocarform" name="nombre" placeholder="Añade el nombre de la actividad" required>
          </div>
         
          <div class="mb-3">
          <label for="desc" class="form-label">Descripción de la actividad</label>
            <input type="text" class="form-control recolocarform" name="desc" placeholder="Añade la descripción de la actividad" required>
          </div>
         
          <div class="mb-3">
          <label for="dur" class="form-label">Duración de la actividad</label>
            <input type="text" class="form-control recolocarform" name="dur" placeholder="Añade la duración estimada de la actividad" required>
          </div>
          
          <div class="mb-3">
          <label for="topic" class="form-label">Tópico</label>
            <select  name="topic" class="" required>                   
                <option value="1">Informatica</option>
                <option value="2">Matematicas</option>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="img" class="form-label">Imagen de la actividad</label>
            <input type="file" class="form-control recolocarform" name="img" required>
          </div>

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