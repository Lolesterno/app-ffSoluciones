<h1>Cotizaciones</h1>

<div id="app">
    <nav class="tabs">
        <button type="button" class="actual" data-paso="1">Informacion del Cliente</button>
        <button type="button" data-paso="2">Productos</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Ingrese los datos del Cliente</h2>

        <form action="" class="formulario">
            <?php include_once __DIR__ . '/../templates/formulario_cliente.php' ?>
        </form>                    


    </div>

    <div id="paso-2" class="seccion">
        <h2 class="paso2Titulo">Productos a Cotizar</h2>

        <div class="todoPaso2">
            <form action="/api/temporal" class="formlario-buscar-producto" method="POST" >
                <?php include_once __DIR__ .'/../templates/formulario_producto.php' ?>
                <input type="submit" value="Agregar Producto" class="boton-enviar agregar-producto">
            </form>

            <div class="cotizador" id="cotizador">

            </div>
            <div class="procesar">
                <button type="button" class="boton-enviar procesar">Procesar Cotizacion</button>
            </div>
        </div>

    <div class="paginacion">
        <button id="anterior" class="boton">&laquo; Anterior</button>
        <button id="siguiente" class="boton">Siguiente &raquo;</button>
    </div>
</div>

<?php 

    $script = '
    <script src="build/js/cotizacion.js"></script>
    <script src="build/js/paginador.js"></script>
    ';

?>