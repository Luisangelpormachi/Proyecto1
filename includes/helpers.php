<?php



 function mostrarError($errores, $campo){
     $alerta = '';
     if(isset($errores[$campo]) && !empty($campo)){
         
         $alerta = "<div class ='alerta  alerta-error'>".$errores[$campo]."</div>";
     }
     
     return $alerta;
 }
 
 function borrarErrores(){
    
    $borrado = false;

     if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }
    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }
    if(isset($_SESSION['errores_categoria'])){
        $_SESSION['errores_categoria'] = null;
        $borrado = true;
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }    
    return $borrado;
    }
    
    function conseguirCategorias($db){
        $sql = "SELECT * FROM categoria ORDER BY id ASC;";
        $categorias = mysqli_query($db, $sql);
     
    $resultado = array();
     if($categorias && mysqli_num_rows($categorias) >= 1){
         $resultado = $categorias;
    }
     return $resultado;
     
    }

    function conseguirCategoria($db, $id){
        $sql = "SELECT * FROM categoria WHERE id = $id";
        $categorias = mysqli_query($db, $sql);
     
    $resultado = array();
     if($categorias && mysqli_num_rows($categorias) >= 1){
         $resultado = mysqli_fetch_assoc($categorias);
    }
     return $resultado;
     
    }  
    
    function conseguirUltimasEntradas($db){
       $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categoria c ON e.categoria_id = c.id ORDER BY e.id DESC limit 4";
    

       $entradas = mysqli_query($db, $sql);

       $resultado = array();
       if($entradas && mysqli_num_rows($entradas) >= 1){
            $resultado = $entradas;
        }
        return $entradas;
    }

    function conseguirTodasEntradas($db){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categoria c ON e.categoria_id = c.id ORDER BY e.id ASC";
        
        $entradas = mysqli_query($db, $sql);
 
        $resultado = array();
        if($entradas && mysqli_num_rows($entradas) >= 1){
             $resultado = $entradas;
     }
     return $entradas;
     }

     function conseguirEntrada($db, $id){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categoria c ON e.categoria_id = c.id  WHERE categoria_id = $id ORDER BY e.id ASC";
        
        $entradas = mysqli_query($db, $sql);
 
        $resultado = array();
        if($entradas && mysqli_num_rows($entradas) >= 1){
             $resultado = $entradas;
     }
     return $entradas;
     }

     function conseguirCadaEntrada($db, $id){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categoria c ON e.categoria_id = c.id  WHERE e.id = $id";
        
        $entrada = mysqli_query($db, $sql);
 
        $resultado = array();
        if($entrada && mysqli_num_rows($entrada) >= 1){
             $resultado = mysqli_fetch_assoc($entrada);
     }
     return $resultado;
     }


     

?>


