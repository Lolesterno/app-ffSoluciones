<aside class="sidebar">
    <h2>Ferreteria Forero S.A</h2>
    <h2><?php echo $_SESSION['nombre'] ?></h2>

    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Clientes') ? 'activo' : ''; ?>" href="">Clientes</a>
        <a class="<?php echo ($titulo === 'Cotizaciones') ? 'activo' : ''; ?>" href="">Cotizaciones</a>
        <a class="<?php echo ($titulo === 'Productos') ? 'activo' : ''; ?>" href="">Productos</a>
        <a class="<?php echo ($titulo === 'Usuarios') ? 'activo' : ''; ?>" href="">Usuarios</a>
        <a class="<?php echo ($titulo === 'Garantias') ? 'activo' : ''; ?>" href="">Garantias</a>
        <a class="<?php echo ($titulo === 'Despachos') ? 'activo' : ''; ?>" href="">Despachos</a>
        <a class="<?php echo ($titulo === 'Mercancia Asegurada') ? 'activo' : ''; ?>" href="">Mercancia Asegurada</a>
        <a class="cerrar" href="/logout">Cerrar Sesión</a>
    </nav>
</aside>