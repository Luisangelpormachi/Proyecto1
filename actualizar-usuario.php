<?php 


if(isset($_POST)){
    
    require_once 'includes/conexion.php';
   
    //RECOGER LOS VALORES DEL FORMULARIO DE ACTUALIZACION
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : FALSE;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']): FALSE;
    $email =$_POST['email'] ? mysqli_real_escape_string($conexion, trim($_POST['email'])): FALSE;
    
    
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



    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = TRUE;
       

//    var_dump(mysqli_error($conexion));
//   die();
        
        // COMPROBAR SI EMAIL EXISTE

        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($conexion, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            
            //ACTUALIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD  
            
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($conexion, $sql );

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                
                $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos!!";
            }


        }else{  
                $_SESSION['errores']['general'] = "Email ya es uso";
        }   
    
    }
    else{
      $_SESSION['errores']= $errores; 
    }  
}            
        
header('Location: mis-datos.php');

?>

