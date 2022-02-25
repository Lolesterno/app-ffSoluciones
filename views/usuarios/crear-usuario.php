<?php   include_once __DIR__.'/../templates/header.php';
        include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/usuarios" class="volver">&laquo; Volver</a>

<form action="/crear-usuario" method="POST" class="formulario">

    <?php include_once __DIR__ .'/formulario.php' ?>

    <div class="boton-general">
        <button type="submit"><i class="bi bi-plus-lg"></i> Crear Usuario</button>
    </div>
</form>