<h2>Crear Usuario</h2>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/usuarios" class="boton-crear">&laquo; Volver</a>

<form action="/crear-usuario" method="POST" class="formulario">

    <div class="campo">
        <label for="nombre">Nombre del Usuario</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Asesor"
            value="<?php echo s($usuario->nombre) ?>"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apellido del Usuario</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Apellido del Asesor"
            value="<?php echo s($usuario->apellido) ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Telefono del Asesor"
            value="<?php echo s($usuario->telefono) ?>"
        />
    </div>

    <div class="campo">
        <label for="usuario">Usuario</label>
        <input 
            type="text"
            id="usuario"
            name="usuario"
            placeholder="Usuario"
            value="<?php echo s($usuario->usuario) ?>"
        />
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="text"
            id="email"
            name="email"
            placeholder="Email del Asesor"
            value="<?php echo s($usuario->email) ?>"
        />
    </div>

    <div class="campo">
        <label for="pass">Contraseña</label>
        <input 
            type="password"
            id="pass"
            name="pass"
        />
    </div>

    <div class="campo">
        <label for="rol">Rol del usuario</label>
        <select name="rol" id="rol">
            <option value="1">Administrador</option>
            <option value="2">Asesor</option>
        </select>        
    </div>

    <input type="submit" value="Crear Usuario" class="boton-crear">
</form>