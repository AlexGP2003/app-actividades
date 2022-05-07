<?php
include '../query/connection.php';
if(isset($_POST['Enviar']) && !empty($_POST['mail']) && !empty($_POST['user']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
    if ($_POST['pass1']==$_POST['pass2']){
        $mail=$_POST['mail'];
        $mail=$connection->escape_string($mail);
        $pass=sha1($_POST['pass1']);
        $pass=$connection->escape_string($pass);
        $usuario=$_POST['user'];
        $usuario=$connection->escape_string($usuario);        
        $sql= "SELECT Id from usuario where mail='$mail'";
        $query=mysqli_query($connection,$sql);
        if($query->num_rows=="0"){
            $sql2= "SELECT Id from usuario where usuario='$usuario'";
            $query2=mysqli_query($connection,$sql2);
            if($query2->num_rows=="0"){
            $sql3="INSERT INTO `usuario` (`Id`, `mail`, `pass`, `usuario`) VALUES (NULL,'$mail','$pass','$usuario');";
            $query3=mysqli_query($connection,$sql3);
            // echo $usuario;
            // echo "<br>";
            // echo $mail;
            // echo "<br>";
            // echo $pass;
            // echo "<br>";
            // die();
            // https://www.baulphp.com/prevenir-la-inyeccion-sql-en-php-ejemplo-completo/
            header("Location: ../view/login.php");
            }else{
                //Nombre de usuario ya insertado.
                header("Location: ../view/registro.php?error=0");             
            }
        }else{
            //Correo ya insertado
            header("Location: ../view/registro.php?error=1");            
        }
    }else{
        //contraseñas equivocadas
        header("Location: ../view/registro.php?error=2");
    }
}else{
    //falta algun campo por colocar
    header("Location: ../view/registro.php?error=3");
}