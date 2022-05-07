<?php
session_start();
if(isset($_GET['Id']) && isset($_SESSION['user'])){
    include '../query/connection.php';
    $Id=$_GET['Id'];
    $sql="DELETE FROM `favoritos` WHERE Id=$Id;";
    $query=mysqli_query($connection,$sql);
    header("Location: ../view/actividades.php");
}else{
    header("Location: ../view/login.php");
}