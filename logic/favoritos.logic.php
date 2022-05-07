<?php
session_start();
if(isset($_SESSION['user']) && isset($_GET['act'])){
    include '../query/connection.php';
    $user=$_SESSION['user'];
    $act=$_GET['act'];
    $sql="INSERT INTO `favoritos` (`Id`, `Actividad`, `Usuario`) VALUES (NULL, '$act',(SELECT Id from usuario where usuario='$user'));";
    $query=mysqli_query($connection,$sql);
    header("Location: ../view/actividades.php");
}else{
    header("Location: ../view/login.php");
}