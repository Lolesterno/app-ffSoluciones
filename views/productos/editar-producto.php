<?php include_once __DIR__ . '/../templates/header.php' ?>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/productos" class="volver">&laquo; Volver</a>

<form method="POST" class="formulario" enctype="multipart/form-data">
    
    <?php include_once __DIR__ . '/formulario.php' ?>

    <div class="boton-general">
        <button type="submit">Actualizar Producto</button>
    </div>
</form>

