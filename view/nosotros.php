<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
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
    <!-- Topics -->

    <div class="row-c padding-m">
        <div class="column-66 padding-m padding-right">
            <h5>Topics</h5>
            <button type="button" class="btn btn-primary mt-1">matemáticas</button>
            <button type="button" class="btn btn-info mt-1">informática</button>
            <button type="button" class="btn btn-dark mt-1">...</button>
        </div>
    </div>

    <!-- Intro -->
    <header class="text-white flex padding-l">
        <h1><strong>#AppName</strong></h1>
    </header>
    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Navega</h5>
        </div>
        <div class="column-66 padding-m padding-right">
            <!-- <h2><strong>#AppName</strong> es un club para explorar, desarrollar y compartir nuestra creatividad natural</h2> -->
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore, corporis ipsa. Non, exercitationem! Vel enim exercitationem dolores, incidunt, molestias praesentium magnam cumque nostrum aperiam ducimus tempore? Fugit placeat debitis asperiores.</h4>
        </div>
    </div>

    <!-- Random de actividades -->
    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Subidas recientemente</h5>
        </div>
        <div class="column-1 padding-s">
    <?php
    include '../query/connection.php';
    $sql1="SELECT Fecha_subida, imagen FROM `actividad`;";
    $query1=mysqli_query($connection,$sql1);
    $likes=array();
    foreach ($query1 as $act) {
        $likes[$act['imagen']]=$act['Fecha_subida'];      
    }
    arsort($likes);
    $cont=0;
    foreach ($likes as $link=>$like){
        if($cont!=4){
            echo "<div class='column-4 padding-s'>";
            echo "<img src='../img/{$link}' alt='' class='target-s'>";
            echo "<br>";
            echo "</div>";
        }else{
             break;
        }   
        $cont++; 
    }  
    ?>
        </div>
    </div>

</body>

</html>