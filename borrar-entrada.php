<?php

require_once 'includes/conexion.php';




if(isset($_SESSION['usuario']) && isset($_GET['id'])){

    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];

    $sql = "DELETE FROM entradas WHERE  $entrada_id = id  AND  $usuario_id = usuario_id ";
    $borrar = mysqli_query($conexion, $sql);

    

    header("location: index.php");

};
?>