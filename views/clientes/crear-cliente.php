<?php include_once __DIR__ .'/../templates/header.php' ?>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/clientes" class="volver">&laquo; Volver</a>

<form action="/crear-cliente" method="POST" class="formulario">
    
    <?php include_once __DIR__ .'/formulario.php' ?>

    <div class="boton-general">
        <button type="submit"><i class="bi bi-plus-lg"></i> Crear Cliente</button>
    </div>
</form>