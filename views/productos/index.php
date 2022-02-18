<h2>Productos FF Soluciones</h2>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<div id="productos" class="secciones">

    <div class="botones-superior">
        <a href="/generar-pdf" class="boton boton-pequeño">Descargar lista de productos</a>
        <?php if($_SESSION['admin']){ ?>
            <a href="/crear" class="boton-crear">Nuevo Producto</a>
        <?php } ?>
    </div>

    <form action="/api/buscarProducto" class="buscador">
        <input type="search" name="buscarProducto"  placeholder="Codigo o Nombre del Producto">
        <button type="" class="boton-crear" id="buscador">Buscar</button>
    </form>
   

    <div class="resultado">
        <!--Resultado con JS-->
    </div>


    <div id="listado-productos" class="listado-productos">
        <!--Productos llegados con JS-->
    </div>

</div>

<?php

    $script = '<script src="build/js/buscador.js"></script>';
    $script .= '<script src="build/js/productos.js"></script>';

?>