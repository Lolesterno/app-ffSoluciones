<h2>Crear un nuevo Producto</h2>

<a href="/productos" class="boton-crear">&laquo; Volver</a>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<form action="/crear" method="POST" class="formulario" enctype="multipart/form-data">
    <div class="campo">
        <label for="codigo">Codigo del producto</label>
        <input 
            type="text"
            id="codigo"
            name="codigo"
            value="<?php echo s($productos->codigo) ?>"
        />
    </div>

    <div class="campo">
        <label for="nombre">Nombre del producto</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            value="<?php echo s($productos->nombre) ?>"            
        />
    </div>

    <div class="campo">
        <label for="precio">Precio del producto</label>
        <input 
            type="number"
            id="precio"
            name="precio"
            min="0"
            value="<?php echo s($productos->precio) ?>"
        />
    </div>

    <div class="campo">
        <label for="descripcion">Descripcion del producto</label>
        <textarea name="descripcion" id="descripcion" ><?php echo s($productos->descripcion) ?></textarea>
    </div>

    <div class="campo">
        <label for="diametro">Diametro del producto</label>
        <input 
            type="text"
            id="diametro"
            name="diametro"
            value="<?php echo s($productos->diametro) ?>"
        />
    </div>

    <div class="campo">
        <label for="imagen">Imagen del producto</label>
        <input 
            type="file"
            id="imagen"
            name="imagen"
            
        />

        <?php if($productos->imagen): ?>
            <img src="public/imagenes/<?php echo $productos->imagen ?>" alt="Imagen del Producto" class="imagen-small">
        <?php endif ?>
    </div>

    <div class="campo">
        <label for="categoria">Categoria del Producto</label>
        <select name="categoriaId" id="categoria">
            <option value="" selected>--Seleccione una categoria--</option>
            <?php foreach($categorias as $categoria): ?>
                <option <?php echo $productos->categoriaId === $categoria->id ? 'selected' : ''; ?>
                    value="<?php echo s($categoria->id); ?>"> <?php echo s($categoria->categoria) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="submit" value="Crear Producto" class="boton-crear">
</form>