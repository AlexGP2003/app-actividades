<?php
include '../query/connection.php';
if(!empty($_POST['user']) && !empty($_POST['psw'])){
    $user = $_POST['user'];
    $pass = sha1($_POST['psw']);
    $sql = "SELECT usuario FROM usuario WHERE (mail = '$user' or usuario='$user') and pass = '{$pass}'";
    $query= mysqli_query($connection,$sql);
    if($query->num_rows=="1"){
        session_start();
        foreach ($query as $nomuser) {
            $_SESSION['user']=$nomuser['usuario'];
        }
        header("Location: ../view/nosotros.html");
    }else{
        //no existe el usuario o la contraseña esta mal
        header("Location: ../view/login.php?error=0");
    }
}else{
    //falta algun campo por colocar
    header("Location: ../view/login.php?error=1");
}
    