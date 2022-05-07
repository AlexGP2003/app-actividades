<?php
//inicio la sesión
session_start();
//Compruevo que he recibido al usuario y la id de la actividad sino lo llevo al login
if(isset($_SESSION['user']) && isset($_GET['act'])){
    //Si es asi, incluyo el fichero de conexion 
    include '../query/connection.php';
    //Recojo las variables
    $user=$_SESSION['user'];
    $act=$_GET['act'];
    //Y inserto el nuevo registro de favorito y lo llevo a la pagina de las actividades
    $sql="INSERT INTO `favoritos` (`Id`, `Actividad`, `Usuario`) VALUES (NULL, '$act',(SELECT Id from usuario where usuario='$user'));";
    $query=mysqli_query($connection,$sql);
    header("Location: ../view/actividades.php");
}else{
    header("Location: ../view/login.php");
}