<?php   include_once __DIR__ .'/../templates/header.php';
        include_once __DIR__ .'/../templates/alertas.php'?>


<div class="cotizador">

    <div class="form">
        <h3>Cliente</h3>

        <div class="formulario">
            <div class="campo">
                <label for="nit">Nit: </label>
                <input type="number" name="nit" id="nit">
            </div>

            <div class="campo">
                <label for="razon">Razon Social: </label>
                <input type="text" name="razon" id="razon" disabled>
            </div>

            <div class="campo">
                <label for="correo">Correo Electronico: </label>
                <input type="text" name="correo" id="correo" disabled>
            </div>

            <div class="campo">
                <label for="direccion">Direccion: </label>
                <input type="text" name="direccion" id="direccion" disabled>
            </div>

            <div class="campo">
                <label for="ciudad">Ciudad: </label>
                <input type="text" name="ciudad" id="ciudad" disabled>
            </div>

            <div class="campo">
                <label for="telefono">Telefono: </label>
                <input type="number" name="telefono" id="telefono" disabled>
            </div> 
        </div>
        

        <h3>Producto</h3>

        <form class="formulario forms" id="formulario" >
            <div class="campo">
                <label for="codigo">Codigo del Producto: </label>
                <input type="text" name="codigo" id="codigo">
            </div>

            <div class="campo">
                <label for="producto">Nombre del Producto: </label>
                <input type="text" name="producto" id="producto" disabled>
            </div>

            <div class="campo">
                <label for="precio">Precio del Producto: </label>
                <input type="text" name="precio" id="precio" disabled>
            </div>

            <div class="campo">
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" id="cantidad">
            </div>

            <div class="campo">
                <label for="descuento">Descuento: </label>
                <input type="number" name="descuento" id="descuento">
            </div>

            <div class="botoncrear">
                <input type="submit" class="crear" id="crear" value="Agregar Producto">
            </div>
        </form>

    </div>

    <div class="productos-cotizados">

        <div class="producto-cotizado">
            <p class="item">1</p>
            <h3>Nombre del Producto</h3>
            <h4>$.123.456</h4>
            <div class="cantidad-descuento">
                <p>25 UND</p>
                <p>25%</p>
            </div>
            <div class="borrar-producto">
                <button type="button"><i class="bi bi-trash-fill"></i></button>
            </div>
        </div>

        

    </div>
</div>




<?php 

    $script = '<script src="build/js/cotizacion.js"></script>';

?>