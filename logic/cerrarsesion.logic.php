<?php
//Inicio la sesión
session_start();
//Destruyo la sesión
session_destroy();
//Lo redirijo a index
header("Location: ../index.html");