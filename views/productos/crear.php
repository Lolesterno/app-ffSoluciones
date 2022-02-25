<?php include_once __DIR__ .'/../templates/header.php' ?>

<a href="/productos" class="volver">&laquo; Volver</a>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<form action="/crear" method="POST" class="formulario" enctype="multipart/form-data">
    
    <?php include_once __DIR__ . '/formulario.php' ?>

    <div class="boton-general">
        <button type="submit"><i class="bi bi-bag-plus-fill"></i> Crear Producto</button>
    </div>
</form>