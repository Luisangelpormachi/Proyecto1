<?php 
require_once 'includes/helpers.php';
?>
<?php 
require_once 'includes/conexion.php';
?>

<?php 
    
    $categoria = conseguirCategoria($conexion, $_GET['id']);

    if(!isset($categoria['id'])){
        header("location: index.php");
    }

?>

<?php 
require_once 'includes/cabecera.php';
?>

<?php
require_once 'includes/lateral.php';
?>



<!-- CAJA PRINCIPAL -->

<div id="principal">

        <?php 

            $categoria = conseguirCategoria($conexion, $_GET['id']);

        ?>

    <h1> Entradas de <?= $categoria['nombre'] ?></h1>
    
    <?php 
        $entradas = conseguirEntrada($conexion, $_GET['id']);
        
        

        if(!empty($entradas) && mysqli_num_rows($entradas)>=1):
            
            while($entrada = mysqli_fetch_assoc($entradas)):      
    ?>              
                    <article class="entrada">
                        <a href="entrada.php?id=<?= $entrada['id'] ?>">
                            <h2><?=$entrada['id'].".- ".$entrada['titulo']?></h2>
                            <span class="fecha"><?=$entrada['categoria'].' | '. $entrada['fecha']?></span>
                            <p>
                                <?= substr($entrada['descripcion'], 0,200)." ..." ?>
                            </p>
                        </a>
                    </article> 
    <?php  
                
            endwhile;
        else:
        
    ?>
    <div class="alerta">No hay entradas en esta categoria</div>

    <?php endif; ?>
</div>
   
<?php 
require_once 'includes/pie.php';
?>
        
    </body>
</html>