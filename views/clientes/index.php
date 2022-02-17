<h1>Clientes</h1>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<?php if($_SESSION['admin'] ) : ?>
    <a href="/crear-cliente" class="boton-crear">Nuevo Cliente</a>
<?php endif ?>

<div id="cliente" class="usuarios">
    <!--Aqui van todos los usuarios por JS-->
</div>

<?php

    $script = '<script src="build/js/clientes.js"></script>';

?>