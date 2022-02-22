<h1>Garantias</h1>

<?php if( count($garantias) === 0 ){ ?>
    <p class="no-garantias">No hay Garantias Creadas <a href="/crear-garantia">Crear una nueva Garantia</a></p>
<?php } else { ?>
    <a href="/crear-garantia" class="nueva-garantia">Crear una nueva Garantia</a>
    <ul class="listado-garantias">
        <?php foreach($garantias as $garantia): ?>
            <li class="garantia">
                <a href="/garantia?url=<?php echo $garantia->url ?>">
                    <?php echo $garantia->nombreCliente ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php } ?>