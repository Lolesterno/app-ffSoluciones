<?php include_once __DIR__ .'/../templates/header.php';
      include_once __DIR__ .'/../templates/alertas.php' ?>


<?php if( isset($_SESSION['admin']) ): ?>
    <div class="botoncrear">
        <a href="/crear-usuario" class="crear-cliente"><i class="bi bi-person-plus-fill"></i> Crear nuevo Usuario</a>
    </div>
<?php endif ?>

<div id="usuario" class="usuarios">
    <!-- Aqui vienen los usuarios desde una base de datos -->
</div>


<?php

    $script = '<script src="build/js/usuarios.js"></script>';

?>