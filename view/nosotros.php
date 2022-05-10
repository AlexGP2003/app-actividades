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
                        <a class="nav-link active disabled" href="./nosotros.php">Sobre nosotros</a>
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
    <!-- Topics -->

    <div class="row-c padding-m">
        <div class="column-66 padding-m padding-right">
            <h5>Topics</h5>
            <?php
            $sql="SELECT distinct(a.topico) as ID ,t.Nombre as Nombre from topicos t inner join actividad a on t.Id=a.topico";
            //Realizamos la query
            $top=array();
            $query=mysqli_query($connection,$sql);
            foreach ($query as $topics){
                $top[$topics['Nombre']]=$topics['ID'];
            }
            foreach ($top as $Nombre=>$Id){
                echo "<a type='button' class='btn btn-dark mt-1' href='./topicos.php?Topico=$Nombre&Id=$Id'>$Nombre</a>  ";
            }
            ?>
        <a type='button' class='btn btn-dark mt-1' href='./topicos.php'>...</a> 
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
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore, corporis ipsa. Non, exercitationem! Vel enim exercitationem dolores, incidunt, molestias praesentium magnam cumque nostrum aperiam ducimus tempore? Fugit placeat debitis asperiores.</h4>
        </div>
    </div>

    <!-- Actividades subidas recientemente -->
    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Subidas recientemente</h5>
        </div>
        <div class="column-1 padding-s">
    <?php
    //Incluimos el fichero de conexion
    include '../query/connection.php';
    //Cogemos los datos necesarios
    $sql1="SELECT Fecha_subida, imagen FROM `actividad`;";
    $query1=mysqli_query($connection,$sql1);
    //Creamos un array asociativo
    $likes=array();
    //Y lo rellenamos con la url->fecha de subida
    foreach ($query1 as $act) {
        $likes[$act['imagen']]=$act['Fecha_subida'];      
    }
    //Lo ordenamos de mayor a menor
    arsort($likes);
    //Creamos un contador para sacarlo del bucle
    $cont=0;
    //Para cada registro miramos si el contador es diferente a 4, si lo es salimos, sino imprimimos los datos 
    foreach ($likes as $link=>$like){
        if($cont!=4){
            echo "<div class='column-4 padding-s'>";
            echo "<img src='../img/{$link}' alt='' class='target-s'>";
            echo "<br>";
            echo "</div>";
        }else{
             break;
        }   
        //Incrementamos el contador
        $cont++; 
    }  
    ?>
        </div>
    </div>

</body>

</html>