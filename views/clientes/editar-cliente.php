<?php include_once __DIR__ .'/../templates/header.php' ?>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/clientes" class="volver">&laquo; Volver</a>

<form class="formulario" method="POST">
   
    <?php include_once __DIR__ . '/formulario.php' ?>

    <div class="boton-general">
        <button type="submit"><i class="bi bi-pencil"></i> Editar Cliente</button>
    </div>
</form>