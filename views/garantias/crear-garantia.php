<h1>Crear Nueva Garantia</h1>

<div class="contenedor-sm">
    <?php ?>
    <form action="/crear-garantia" method="POST" class="formulario">
        <div class="campo">
            <label for="nombreCliente">Nombre del Cliente</label>
            <input type="text" name="nombreCliente" id="nombreCliente" placeholder="Nombre del Cliente">
        </div>
        <input type="submit" value="Crear Garantia" class="boton-crear">
    </form>
</div>