<?php
//Incluimos el fichero de conexion
include '../query/connection.php';
//Si el usuario o la contraseña estan vacios lo llevo al login, sino entro 
if(!empty($_POST['user']) && !empty($_POST['psw'])){
    //Recojo las variables
    $user = $_POST['user'];
    $pass = sha1($_POST['psw']);
    //Miro con la sentencia sql si esta el usuario insertado, si lo esta creo una sesion con su nombre y lo llevo a nosotros y sino lo llevo al login 
    $sql = "SELECT usuario FROM usuario WHERE (mail = '$user' or usuario='$user') and pass = '{$pass}'";
    $query= mysqli_query($connection,$sql);
    if($query->num_rows=="1"){
        session_start();
        $_SESSION['user']=(mysqli_fetch_array($query)[0]);
        echo $_SESSION['user'];
        header("Location: ../view/nosotros.php");
    }else{
        //no existe el usuario o la contraseña esta mal
        header("Location: ../view/login.php?error=0");
    }
}else{
    //falta algun campo por colocar
    header("Location: ../view/login.php?error=1");
}
    