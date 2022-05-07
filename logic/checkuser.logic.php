<?php
//Incluimos el fichero de conexion 
include '../query/connection.php';
// Compruebo que he recibido todos los datos
if(isset($_POST['Enviar']) && !empty($_POST['mail']) && !empty($_POST['user']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
    if ($_POST['pass1']==$_POST['pass2']){
        //Recojo las variables y le paso el filtro para evitar la inyeccion mysql
        $mail=$_POST['mail'];
        $mail=$connection->escape_string($mail);
        $pass=sha1($_POST['pass1']);
        $pass=$connection->escape_string($pass);
        $usuario=$_POST['user'];
        $usuario=$connection->escape_string($usuario);        
        // Realizo la sentecia mysql donde busco si hay un usuario con ese mail
        $sql= "SELECT Id from usuario where mail='$mail'";
        //Realizo la query
        $query=mysqli_query($connection,$sql);
        //Si no hay filas, es que no ha encontrado nada sino, hay un usuario con ese mail y le digo ya que esta insertado
        if($query->num_rows=="0"){
            //Si lo hay miro el nombre de usuario
            $sql2= "SELECT Id from usuario where usuario='$usuario'";
            //Realizo la query 
            $query2=mysqli_query($connection,$sql2);
            //Si la hay es que hay un usuario con ese nombre, sino no
            if($query2->num_rows=="0"){
            //Sino le inserto el usuario y realizo la query y lo redirijo al login
            $sql3="INSERT INTO `usuario` (`Id`, `mail`, `pass`, `usuario`) VALUES (NULL,'$mail','$pass','$usuario');";
            $query3=mysqli_query($connection,$sql3);
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