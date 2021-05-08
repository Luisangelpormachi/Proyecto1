<?php 
require_once 'includes/redireccion.php';
?>
<?php 
require_once 'includes/cabecera.php';
?>

<?php
require_once 'includes/lateral.php';
?>


<!-- CAJA PRINCIPAL -->           
<div id="principal">
    <h1>Crear categorias</h1>
    <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
    <br>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" name="nombre">
        <?php echo isset($_SESSION['errores_categoria']) ? mostrarError($_SESSION['errores_categoria'], 'nombre'): ''; ?>
        <input type="submit" value="guardar">
        
    </form>
    <?php borrarErrores(); ?>
</div>

<!-- FIN PRINCIPAL -->         
<?php
require_once 'includes/pie.php';
?>






<?php

?>


