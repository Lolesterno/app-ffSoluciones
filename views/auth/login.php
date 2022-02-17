<h1 class="nombre-pagina">Iniciar sesion</h1>

<div class="tarjeta login">

<?php include_once __DIR__ .'/../templates/alertas.php'; ?>

    <form action="/" method="POST" class="formulario">
        <div class="campo">
            <label for="usuario">Nombre de Usuario</label>
            <input 
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Usuario asignado por el Administrador"
            />
        </div>

        <div class="campo">
            <label for="password">Contraseña</label>
            <input 
                type="password"
                id="password"
                name="pass"
                placeholder="Contraseña Asignada"
            />
        </div>

        <input type="submit" value="Iniciar Sesion" class="boton">
    </form>
</div>