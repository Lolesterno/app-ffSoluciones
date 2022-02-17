<h2>Editar Producto</h2>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/productos" class="boton-crear">&laquo; Volver</a>

<form method="POST" class="formulario" enctype="multipart/form-data">
    <div class="campo">
        <label for="codigo">Codigo</label>
        <input 
            type="text"
            name="codigo"
            id="codigo"
            value="<?php echo s($producto->codigo) ?>"
        />
    </div>

    <div class="campo">
        <label for="nombre">Nombre del Producto</label>
        <input 
            type="text"
            name="nombre"
            id="nombre"
            value="<?php echo s($producto->nombre) ?>"
        />
    </div>

    <div class="campo">
        <label for="precio">Precio del Producto</label>
        <input 
            type="text"
            name="precio"
            id="precio"
            value="<?php echo s($producto->precio) ?>"
        />
    </div>

    <div class="campo">
        <label for="diametro">Diametro del Producto</label>
        <input 
            type="text"
            name="diametro"
            id="diametro"
            value="<?php echo s($producto->diametro) ?>"
        />
    </div>

    <div class="campo">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"><?php echo s($producto->descripcion) ?></textarea>
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <?php if($producto->imagen): ?>
            <img src="imagenes/<?php echo $producto->imagen ?>" alt="Imagen del Producto" class="imagen-small">
        <?php endif ?>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
    </div>

    <div class="campo">
        <label for="categoria">Categoria del producto</label>
        <select name="categoriaId" id="categoria">
            <option value="">-- Seleccione una opcion --</option>
            <?php foreach($categorias as $categoria): ?>
                <option <?php echo $producto->categoriaId === $categoria->id ? 'selected' : '' ?>
                    value="<?php echo s($categoria->id) ?>"> <?php echo s($categoria->categoria) ?>
                </option>
            <?php endforeach?>
        </select>
    </div>

    <input type="submit" value="Actualizar Producto" class="boton-crear">
</form>

<form action="/productos/eliminar" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <input type="submit" value="Borrar" class="boton-borrar">
</form>