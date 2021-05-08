<?php 
require_once 'includes/cabecera.php';
?>

<?php
require_once 'includes/lateral.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Todas las Entradas</h1>
    
    <?php 
        $entradas = conseguirTodasEntradas($conexion);
        
        if(!empty($entradas)):
            
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