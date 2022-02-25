<?php   include_once __DIR__ .'/../templates/header.php';
        include_once __DIR__ .'/../templates/alertas.php' ?>

<div class="botoncrear">
    <a href="/nueva-cotizacion" class="crear"><i class="bi bi-list-ol"></i> Nueva Cotizacion</a>
</div>

<div class="cotizaciones">
    <div class="cotizacion estado pendiente">
        <p class="nit">Cotizacion # 123</p>
        <h3>Nombre de la empresa de la Oferta</h3>
        <div class="datosCiudad">
            <p>Nit: 12341564</p>
            <p>Bogotá</p>
        </div>
        <h4>$.123.123.100</h4>

        <div class="opciones">
            <button type="button" class="ver-oferta">Ver Oferta</button>
            <button type="button" class="aprobar-oferta">Aprobar Oferta</button>
            <button type="button" class="anular-oferta">Anular Oferta</button>
        </div>
    </div>

    <div class="cotizacion estado aceptada">
        <p class="nit">Cotizacion # 123</p>
        <h3>Nombre de la empresa de la Oferta</h3>
        <div class="datosCiudad">
            <p>Nit: 12341564</p>
            <p>Bogotá</p>
        </div>
        <h4>$.123.123.100</h4>

        <div class="opciones">
            <button type="button" class="ver-oferta">Ver Oferta</button>
            <button type="button" class="aprobar-oferta">Aprobar Oferta</button>
            <button type="button" class="anular-oferta">Anular Oferta</button>
        </div>
    </div>

    <div class="cotizacion estado anulada">
        <p class="nit">Cotizacion # 123</p>
        <h3>Nombre de la empresa de la Oferta</h3>
        <div class="datosCiudad">
            <p>Nit: 12341564</p>
            <p>Bogotá</p>
        </div>
        <h4>$.123.123.100</h4>

        <div class="opciones">
            <button type="button" class="ver-oferta">Ver Oferta</button>
            <button type="button" class="aprobar-oferta">Aprobar Oferta</button>
            <button type="button" class="anular-oferta">Anular Oferta</button>
        </div>
    </div>
</div>


