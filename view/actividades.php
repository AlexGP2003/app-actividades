<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <!--Menú de navegación-->
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
                        <a class="nav-link active disabled" aria-current="page" href="./actividades.php">Actividades</a>
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
    <!-- Top 5 -->
    <div class="row-c padding-m">
    <h4 class="column-1 padding-m">Top 5</h4>
    <div class="column-1 padding-s">
    <?php
    // Realizaremos la sentencia donde contaremos todas las personas que le han dado like a la imagen, agrupandola por la imagen, junto a la Id de la actividad y la url.
    $sql1="SELECT count(f.Id) as numlikes, f.Actividad as Actividad, a.imagen as link from actividad a inner join favoritos f on A.Id=f.Actividad group by f.Actividad;";
    //Realizaremos la query
    $query1=mysqli_query($connection,$sql1);
    //Y crearemos un array asociativo donde pondremos la url y el numero de likes que tiene la imagen
    $likes=array();
    foreach ($query1 as $act) {
        //Le añadimos todas las imagenes
        $likes[$act['link']]=$act['numlikes'];      
    }
    //Las ordenamos de mayor a menor
    arsort($likes);
    //Creamos un contador para contar las 5 primeras imagenes que serán las que mas likes tengan
    $cont=0;
    foreach ($likes as $link=>$like){
        //Si el contador no es 5 sabremos que aún nos faltan imagenes por poner. Sino le sacaremos con un break
        if($cont!=5){
            echo "<div class='column-5 padding-s'>";
            echo "<img src='../img/{$link}' alt='' class='target-s'>";
            echo "<br>";
            echo "</div>";
        }else{
            break;
        }   
        //Incrementamos el contador
        $cont++; 
    }  
    ?></div></div>

    <!-- Listado de actividades -->
    <div class="row-c">
        <div class="column-1 padding-m">
            <h4 class="padding-m">Explora</h4>
        </div>

        <?php
        //Seleccionamos todos los datos de las actividades que sean publicas
         $sql="SELECT * from actividad where Publica != 0;";
         //Realizamos la query
         $query=mysqli_query($connection,$sql);
         foreach ($query as $actividad){
             //Para cada actividad le pondremos la imagen que tendra una funcion para redirijirlo a la pagina de actividad un boton para conseguir el link de la imagen y otro para darle like
            $act=$actividad['Id'];
            $link="http://localhost/www/app-actividades/view/actividad.php?act=".$act;
            echo "<input id='$act' type='hidden' value='$link'>";
            echo "<div class='column-3 padding-mobile'>";
            //Boton para copiar url
            echo "<img onClick='actividad($act)' src='../img/{$actividad['imagen']}' alt='' class='target'>";
            echo "<div style='float: right;' class='padding-m'>";
            echo "<a class='btn btn-light m-1' onClick='setClipboard($act)' type='button'><i class='fa-solid fa-link'></i></a>";
            //Para el boton de like, comprobaremos si esta logeado, si lo esta si y lo tiene como favoritos lo vera verde, si no lo tiene como favoritos o no esta logeado lo vera gris. Y le redirecionaremos a la pagina donde podra ponerlo en favoritos si esta en gris y a donde lo podra quitar como favorito si esta verde. 
            if (isset($_SESSION['user'])){
            $sql2 = "SELECT Id FROM `favoritos` WHERE usuario=(SELECT Id from usuario where usuario='{$_SESSION['user']}') and actividad={$actividad['Id']};";
            $query2 = mysqli_query($connection,$sql2);
            if ($query2->num_rows==0){
            echo "<a class='btn btn-light m-1' type='button' href='../logic/favoritos.logic.php?act={$actividad['Id']}'><i class='fa-solid fa-heart'></i></a>";
        }else{
            $Id=mysqli_fetch_array($query2)[0];
            echo "<a class='btn btn-success m-1' type='button' href='../logic/disfavoritos.logic.php?Id=$Id'><i class='fa-solid fa-heart'></i></a>";
        }
    }else{
        echo "<a class='btn btn-ligth m-1' type='button' href='../logic/favoritos.logic.php?act={$actividad['Id']}'><i class='fa-solid fa-heart'></i></a>";
    }
            echo "</div>";
        echo "</div>";
         }
         ?>
    </div>
    <script>
        //Funcion para redirijir a la pagina de la actividad.
        function actividad(Id){
            window.location.href="./actividad.php?act="+Id;
        }
        //Funcion copiar
        function setClipboard(act) {
            var copyText = document.getElementById(act);
            copyText.type = 'text';
            copyText.select();
            document.execCommand("copy");
            copyText.type = 'hidden';
        }
    </script>
</body>

</html>