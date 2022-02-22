<h2>Usuarios</h2>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/crear-usuario" class="boton">Crear nuevo Usuario</a>

<div id="usuario" class="usuarios">
    <!-- Aqui vienen los usuarios desde una base de datos -->
</div>


<?php

    $script = '<script src="build/js/usuarios.js"></script>';

?>