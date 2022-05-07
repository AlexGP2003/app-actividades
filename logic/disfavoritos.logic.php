<?php
//Inicio la sesión
session_start();
//Compruebo que el nombre de usuario de la sesion y el id del favorito estan recogidos, sino lo llevo al login
if(isset($_GET['Id']) && isset($_SESSION['user'])){
    //incluyo el fichero de conexion 
    include '../query/connection.php';
    //recojo el id en una variable
    $Id=$_GET['Id'];
    //Realizo la sentencia mysql donde elimino el registro, ejecuto la query y lo llevo a la pagina de actividades
    $sql="DELETE FROM `favoritos` WHERE Id=$Id;";
    $query=mysqli_query($connection,$sql);
    header("Location: ../view/actividades.php");
}else{
    header("Location: ../view/login.php");
}