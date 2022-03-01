<?php   include_once __DIR__ .'/../templates/header.php';
        include_once __DIR__ .'/../templates/alertas.php';?>

<div class="botoncrear">
    <a href="/nueva-garantia" class="crear"><i class="bi bi-person-plus-fill"></i> Crear nueva Garantia</a>
</div>


<div class="garantias">
    <?php foreach($todas as $garantia): ?>
        <div class="garantia <?php echo $garantia->estado ?>">
            <?php $garantia->estado === 0 ?? 'pendiente' ?>
            <p class="num-garantia">Garantia #<?php echo $garantia->id ?></p>
            <h3>Empresa de la garantia</h3>
            <p class="fecha">Fecha de Ingreso: <?php echo $garantia->fecha ?></p>
            <h4>Nit: 123456789</h4>
            <h5>Tipo Medidor</h5>
            <h5><?php echo $garantia->serialMedidor ?></h5>
            <p><?php echo $garantia->comentarios ?></p>
        </div>
    <?php endforeach ?>

    
</div>

