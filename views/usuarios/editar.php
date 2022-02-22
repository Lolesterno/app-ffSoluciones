<h2>Editar Usuario</h2>

<?php include_once __DIR__ .'/../templates/alertas.php' ?>

<a href="/usuarios" class="boton-crear">&laquo; Volver</a>

<form class="formulario" method="POST">
    
    <div class="campo">
        <label for="nombre">Nombres </label>
        <input 
            type="text"
            name="nombre"
            id="nombre"
            value="<?php echo s($usuarios->nombre) ?>"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apelldos</label>
        <input 
            type="text"
            name="apellido"
            id="apellido"
            value="<?php echo s($usuarios->apellido) ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            name="telefono"
            id="telefono"
            value="<?php echo s($usuarios->telefono) ?>"
        />
    </div>

    <div class="campo">
        <label for="usuario">Usuario</label>
        <input 
            type="text"
            name="usuario"
            id="usuario"
            value="<?php echo s($usuarios->usuario) ?>"
        />
    </div>

    <div class="campo">
        <label for="email">Correo</label>
        <input 
            type="email"
            name="email"
            id="email"
            value="<?php echo s($usuarios->email) ?>"
        />
    </div>

    <div class="campo">
        <label for="pass">Contraseña nueva</label>
        <input 
            type="password"
            name="pass"
            id="pass"
        />
    </div>

    <div class="campo">
        <label for="rol">Rol del Usuario</label>
        <select name="rol" id="rol">
            <option value="" disabled>-- Seleccione una Opcion --</option>
            <?php foreach ($roles as $rol): ?>
                <option <?php $usuarios->rol === $rol->id ? 'selected' : '' ?> 
                    value="<?php echo s($rol->id) ?>"><?php echo s($rol->rol) ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="submit" value="Actualizar Usuario" class="boton-crear">
   
</form>