<?php 


if(isset($_POST)){
    
    require_once 'includes/conexion.php';
    
    if(!isset($_SESSION)){
    session_start();
    }
    //RECOGER LOS VALORES DEL FORMULARIO REGISTRO
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : FALSE;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']): FALSE;
    $email =$_POST['email'] ? mysqli_real_escape_string($conexion, trim($_POST['email'])): FALSE;
    $password =$_POST['password'] ? mysqli_real_escape_string($conexion, $_POST['password']): false;
    
    //VALIDAR LOS DATOS ANTES DE GUARDAR EN LA BASE DE DATOS
    
    $errores = array();
    
    
    
    
if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_validado = true;
}else{
    $nombre_validado = false;
    $errores['nombre'] = "El nombre no es valido";
    
    
}if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
    $apellidos_validado = true;
}else{
    $apellidos_validado = false;
    $errores['apellidos'] = "los apellidos no son validos";
  
    
}if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
    $email_validado = true;
}else{
    $email_validado = false;
    $errores['email'] = "el email no es valido";
    
}


if(!empty($password) ){
    $password_validado = true;
}else{
    $password_validado = false;
    $errores['password'] = "la contraseña no es valida";
    
}
    $guardar_usuario = false;
    
    if(count($errores) == 0){
       $guardar_usuario = TRUE;
       
       //CIFRA CONTRASEÑA
       
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
    
       
       //INSERTAR USUARIO EN LA TABLA DE LA BBDD  
       
    $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE()); ";
    $guardar = mysqli_query($conexion, $sql );

//    
//    var_dump(mysqli_error($conexion));
//    
//    die();
    
    
    if($guardar){
        $_SESSION['completado']= "El registro se ha completado con éxito.";
    }else{
        $_SESSION['errores']['general']= "Fallo al guardar usuario!!";
    }
        
    
    }
    else{
      $_SESSION['errores']= $errores; 
    }  
}            
        
header('Location: index.php');

?>

