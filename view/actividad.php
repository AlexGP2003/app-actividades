<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
    <!--Menu Nav-->
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
                        <a class="nav-link" aria-current="page" href="./actividades.php">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./topicos.php">Topicos</a>
                    </li>
                
                    <?php
                    //Comprobamos que la sesión está iniciada. 
                    session_start();
                    //Incluiremos el fichero de conexión 
                    include '../query/connection.php';
                    //Si lo esta y tiene establecida la variable de sesión usuario, le pondremos un boton para cerrar sesión que lo redirija a la lógica para cerrar sesión, sino uno de login que lo redirija al formulario del login
                    if (isset($_SESSION['user'])){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' aria-current='page' href='./misactividades.php'>Mis actividades</a>";
                        echo "</li>";
                        echo "</ul>";
                        echo "<div class='d-flex'>";
                        $sql3="SELECT Id FROM `usuario` WHERE usuario='{$_SESSION['user']}';";
                        $query3=mysqli_query($connection,$sql3);
                        $IdUser=mysqli_fetch_array($query3);
                        echo "<a href='./subir.actividades.php?Id=$IdUser[0]' class='btn btn-light form-control ms-1' type='button'><i class='fa-solid fa-arrow-up-from-bracket'></i></a>";
                        echo "<a href='../logic/cerrarsesion.logic.php' class='btn btn-light form-control ms-1' type='button'>Logout</a>";
                    }else{
                        echo "</ul>";
                        echo "<div class='d-flex'>";
                        echo "<a href='./login.php' class='btn btn-light form-control ms-1' type='button'><i class='fa-solid fa-arrow-up-from-bracket'></i></a>";
                        echo "<a href='./login.php' class='btn btn-light form-control ms-1' type='button'>Acceder</a>";
                    }
                    ?>                
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="row-c padding-m">
    <div class="column-2 padding-s">
    <br>
    <?php
    // Incluimos el fichero de conexion
    include '../query/connection.php';
    //Seleccionamos los campos necesarios dependiendo de la id de la actividad
    $sql="SELECT a.Fecha_subida as Fecha_subida, a.imagen as imagen, t.Nombre as Topico, u.mail as Autor, a.Descripcion, a.tiempo_estimado FROM (usuario u inner join actividad a on u.Id=a.autor) inner join topicos t on t.Id=a.topico where a.Id={$_GET['act']}";
    $query=mysqli_query($connection,$sql);
    //Los guardamos en un array
    $act=mysqli_fetch_array($query);
    //Imprimimos los datos
    echo "<img src='../img/{$act['imagen']}' alt=''>";
    echo "</div>";
    echo "<div class='column-2 padding-s'>";
    echo "<h3> Datos </h3>";
    echo "<br>";
    echo "<h6>Fecha subida: {$act['Fecha_subida']}</h6>";
    echo "<h6>Tiempo estimado: {$act['tiempo_estimado']}</h6>";
    echo "<h6>Autor: {$act['Autor']}</h6>";
    echo "<h6>Tópico: {$act['Topico']}</h6>";
    echo "<h6>Descripción: {$act['Descripcion']}</h6>";
    ?>
    </div>
</body>
</html>