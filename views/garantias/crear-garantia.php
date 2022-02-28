<?php   include_once __DIR__ .'/../templates/header.php';
        include_once __DIR__ .'/../templates/alertas.php';
?>

<a href="/garantias" class="volver">&laquo; Volver</a>


<form method="post" class="formulario" enctype="multipart/form-data">
    <?php include_once __DIR__ .'/formulario.php' ?>

    <div class="botoncrear">
        <button type="submit" class="crear">Crear Garantia</button>
    </div>
</form>

<?php 

    $script = '<script src="/build/js/garantias.js"></script>'

?>