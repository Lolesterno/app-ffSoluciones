<div class="contenedor-sm">
    <h1> <?php echo strtoupper($titulo) ?></h1>
    <div class="contenedor-nueva-garantia">
        <button type="button" class="agregar-garantia" id="agregar-garantia">
            &#43; Ingresar Nueva Garantia para Este Cliente
        </button>
    </div>

    <ul class="listado-garantia" id="listado-garantia">
        <!--Todo esto con JS-->
    </ul>
</div>

<?php

    $script = '<script src="build/js/garantias.js"></script>';
    
?>

