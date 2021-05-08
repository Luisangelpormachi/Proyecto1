<?php

// Iniciar sesion y la conexion en la bd

require_once 'includes/conexion.php';


// Recoger datos del formulario

if(isset($_POST)){
    
    
    // Error datos de formulario
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }
    
    // Recojo de datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
}   

    // Consulta para comprobar las credenciales del usuario

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
   
    
    $login = mysqli_query($conexion, $sql);
    
    
    if($login && mysqli_num_rows($login) == 1){
    
    $usuario = mysqli_fetch_assoc($login);
    
    // var_dump($usuario);
    // die();
    
    // Comprobar la contraseña
    
    $verify = password_verify($password, $usuario['password']);
    
    if($verify){
        // Utilizar una sesion para guardar los datos de los usuarios logueados 
        $_SESSION['usuario'] = $usuario;
        
        
    }else{
        $_SESSION['error_login']  = "login incorrecto!!";
    }

    }else{
        // mensaje de error
         $_SESSION['error_login']  = "login incorrecto!!";
    }

    // Redirigir al index.php
    header('location: index.php');



?>
