<?php include_once __DIR__ .'/../templates/header.php' ?>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<?php if( isset($_SESSION['admin']) ) : ?>
    <div class="botoncrear">
        <a href="/crear-cliente" class="crear"><i class="bi bi-person-plus-fill"></i> Nuevo Cliente</a>
    </div>
<?php endif ?>

<div id="cliente" class="clientes">
    <!--Aqui van todos los usuarios por JS-->
</div>

<?php

    $script = '<script src="build/js/clientes.js"></script>';

?>