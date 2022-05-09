<?php
//Incluimos el fichero de conexion
include '../query/connection.php';
//Iniciamos la sesion
session_start();
//Si hay un usuario seguimos, sino lo llevamos al index
if (!(isset($_SESSION['user']))){
    header("Location: ./index.html"); 
}
//Miramos si la variable de la id esta vacia, si no lo esta le asignamos una variable, sino lo esta, hacemos una sentencia sql para descubrirlo
if (empty($_POST['Id'])){
    $sql3="SELECT Id FROM `usuario` WHERE usuario='{$_SESSION['user']}';";
    $query3=mysqli_query($connection,$sql3);
    $IdUser=mysqli_fetch_array($query3);
}else{
    $Id=$_POST['Id'];
}
//Miramos que todos los valores esten completados
if(!(empty($_POST['nombre'])) && !(empty($_POST['desc'])) && !(empty($_POST['dur'])) && !(empty($_POST['topic'])) && !(empty($_FILES['img']))){
    //Recogemos las variables
    $nomact = $_POST['nombre'];
    $desact = $_POST['desc'];
    $duract = $_POST['dur']; 
    $tipact = $_POST['topic'];
    $imgact = $_FILES['img'];
    //Miramos si ha marcado la checkbox
    if (isset($_POST['Publica'])){
        $publi=$_POST['Publica'];
    }else{
        $publi=0;
    }
    //Miramos el dia de hoy
    $dia=getdate();
    //Y lo ponemos en el formato necesario para sql
    $fecha=$dia['year']."-".$dia['mon']."-".$dia['mday'];
    //Ponemos la ruta de nuestro repositorio
    $path="/www/app-actividades/img/";
    //Y ahora la ruta del repositorio mas el servidor
    $destino=$_SERVER['DOCUMENT_ROOT'].$path.$imgact['name'];
    //Guardamos el nombre de la foto
    $destinoguardar=$imgact['name'];
    //Vemos si la imagen es jpg o jpeg, si lo es le dejamos pasar sino le llevamos a subir actividades
    if(($imgact['type']=="image/jpeg" or $imgact['type']=="image/jpg") ){
        //Subimos la imagen al servidor
        $exito=move_uploaded_file($imgact['tmp_name'],$destino);
        //Si podemos subirla insertaremos los datos y lo llevaremos a actividades y sino lo llevamreos a subiractividades
        if ($exito){
            $sql = "INSERT INTO `actividad` (`Id`, `Fecha_subida`, `Descripcion`, `imagen`, `tiempo_estimado`, `autor`, `topico`,`Publica`) VALUES (NULL, '$fecha', '$desact', '$destinoguardar', '$duract', '$Id', '$tipact','$publi')";
            $query= mysqli_query($connection,$sql);
            header("Location: ../view/actividades.php");
        }else{
            // La imagen no se ha podido subir al servidor
            header("Location: ../view/subir.actividades.php?err=3&Id=$Id");
        }
    }else{
        // La imagen no cumple los requisitos
        header("Location: ../view/subir.actividades.php?Id=$Id&err=2");
    }
}else{
    // Faltan datos
    header("Location: ../view/subir.actividades.php?Id=$IdUser[0]&err=1");
}