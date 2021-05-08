<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "blog_master";



$conexion = mysqli_connect($host, $user, $password, $database);
$sql = mysqli_query($conexion, "SET NAMES utf8");

/*
if($conexion == true){
    echo "conectado correctamente";
}else{
    echo "error al conectar". mysqli_error($conexion);
}

if($sql == true){
    echo "<br>"."conectado correctamente";
}else{
    echo "<br>"."error al conectar". mysqli_error($conexion);
}
*/
 //INICIAR LA SESION
if(!isset($_SESSION)){
 session_start();
}

?>

