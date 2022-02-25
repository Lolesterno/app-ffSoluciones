<?php   include_once __DIR__ .'/../templates/header.php'; 
        include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/usuarios" class="volver">&laquo; Volver</a>

<form class="formulario" method="POST">
    
    <?php include_once __DIR__.'/formulario.php' ?>

    <div class="boton-general">
        <button type="submit"><i class="bi bi-pencil"></i> Actualizar Usuario</button>
    </div>
   
</form>