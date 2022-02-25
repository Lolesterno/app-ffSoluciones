<?php include_once __DIR__ .'/../templates/header.php' ?>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<form action="/api/buscarProducto" class="buscador">
    <input type="search" name="buscarProducto"  placeholder="Codigo o Nombre del Producto">
    <button type="" class="boton-crear" id="buscador"><i class="bi bi-search"></i></button>
</form>

<div class="botones-superior">
    <a href="/generar-pdf"><i class="bi bi-cloud-download-fill"></i> Descargar lista de productos</a>
    <?php if( isset($_SESSION['admin']) ){ ?>
        <a href="/crear"><i class="bi bi-bag-plus-fill"></i> Nuevo Producto</a>
    <?php } ?>
</div>

<div class="resultado">
    <!--Resultado con JS-->
</div>


<div id="productos" class="productos">
    <!--Productos llegados con JS-->
</div>



<?php

    $script = '<script src="build/js/buscador.js"></script>';
    $script .= '<script src="build/js/productos.js"></script>';

?>