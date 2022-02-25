<aside class="sidebar">
    <div class="imagen">
        <img src="/build/img/logoff.jpg" alt="">
    </div>
    <h2>Ferreteria Forero S.A</h2>
    <h2><?php echo $_SESSION['nombre'] ?></h2>

    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Clientes') ? 'activo' : ''; ?>" href="/clientes"><i class="bi bi-people-fill"></i> Clientes</a>
        <a class="<?php echo ($titulo === 'Cotizaciones') ? 'activo' : ''; ?>" href="">Cotizaciones</a>
        <a class="<?php echo ($titulo === 'Productos') ? 'activo' : ''; ?>" href="/productos"><i class="bi bi-bag-fill"></i> Productos</a>
        <a class="<?php echo ($titulo === 'Usuarios') ? 'activo' : ''; ?>" href="/usuarios"><i class="bi bi-person-fill"></i> Usuarios</a>
        <?php if(isset($_SESSION['admin'])): ?>
            <a class="<?php echo ($titulo === 'Garantias') ? 'activo' : ''; ?>" href="">Garantias</a>
            <a class="<?php echo ($titulo === 'Despachos') ? 'activo' : ''; ?>" href="">Despachos</a>
            <a class="<?php echo ($titulo === 'Mercancia Asegurada') ? 'activo' : ''; ?>" href="">Mercancia Asegurada</a>
        <?php endif ?>
        <a class="cerrar" href="/logout">Cerrar Sesión</a>
    </nav>
</aside>