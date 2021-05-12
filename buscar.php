<?php 
    if(!isset($_POST['busqueda'])){
        header("location: index.php");
    }
    if(empty($_POST['busqueda'])){
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

   
    <h1>Busqueda de : <?=$_POST['busqueda']?></h1>
    
    <?php 
        $entradas = buscarEntradas($conexion, $_POST['busqueda']);
        
        if(!empty($entradas) && mysqli_num_rows($entradas) >=1 ):
           
            while($entrada = mysqli_fetch_assoc($entradas)):      
    ?>              
                    <article class="entrada">
                        <a href="entrada.php?id=<?= $entrada['id'] ?> ">
                            <h2><?=$entrada['id'].".- ".$entrada['titulo']?></h2>
                            <span class="fecha"><?=$entrada['categoria'].' | '. $entrada['fecha']?></span>
                            <p>
                                <?= substr($entrada['descripcion'], 0,200)." ..." ?>
                            </p>
                        </a>
                    </article> 
    <?php  
                
            endwhile;
        endif;
        
    ?>

</div>
   
<?php 
require_once 'includes/pie.php';
?>
        
    </body>
</html>