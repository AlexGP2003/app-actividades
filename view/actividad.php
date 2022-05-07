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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="#">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <button class="btn btn-light form-control me-1" type="submit"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    <?php
                    session_start();
                    if (isset($_SESSION['user'])){
                        echo "<a href='../logic/cerrarsesion.logic.php' class='btn btn-light form-control ms-1' type='button'>Cerrar sesión con {$_SESSION['user']}</a>";
                    }else{
                        echo "<a href='./login.php' class='btn btn-light form-control ms-1' type='button'>Acceder</a>";
                    }
                    ?> 
                </form>
            </div>
        </div>
    </nav>
    <br>
    <div class="row-c padding-m">
    <div class="column-2 padding-s">
    <br>
    <?php
    include '../query/connection.php';
    $sql="SELECT a.Fecha_subida as Fecha_subida, a.imagen as imagen, t.Nombre as Topico, u.mail as Autor, a.Descripcion, a.tiempo_estimado FROM (usuario u inner join actividad a on u.Id=a.autor) inner join topicos t on t.Id=a.topico where a.Id={$_GET['act']}";
    $query=mysqli_query($connection,$sql);
    $act=mysqli_fetch_array($query);
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