<h3>Datos del Cliente</h3>

<div class="campo">
    <label for="nit">Nit:</label>
    <input type="number" name="nit" id="nit">
</div>

<div class="campo">
    <label for="empresa">Empresa:</label>
    <input type="text" id="empresa" disabled>
</div>

<div class="campo">
    <label for="telefono">Telefono:</label>
    <input type="number" id="telefono" disabled>
</div>

<div class="campo">
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" disabled>
</div>

<div class="campo">
    <label for="correo">Correo:</label>
    <input type="email" id="correo" disabled>
</div>

<div class="campo">
    <label for="departamento">Departamento:</label>
    <select id="departamento" disabled>
        <?php foreach($departamentos as $departamento): ?>
            <option value="<?php echo $departamento->id ?>"><?php echo  $departamento->departamento ?></option>
        <?php endforeach  ?>
    </select>
</div>

<div class="campo">
    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" disabled>
</div>

<h3>Datos del medidor</h3>

<div class="campo">
    <label for="medidor">Tipo de medidor:</label>
    <select name="medidorId" id="medidor">
        <?php foreach($medidores as $medidor): ?>
            <option value="<?php echo $medidor->id ?>"><?php echo $medidor->tipo_medidor ?></option>
        <?php endforeach ?>
    </select>
</div>

<div class="campo">
    <label for="seriales">Seriales:</label>
    <input type="text" name="serialMedidor" id="seriales">
</div>

<div class="campo">
    <label for="tipoFactura">Tipo de Factura</label>
    <select name="tipoFactura" id="tipoFactura">
        <option value="">--Seleccione el tipo de factura--</option>
        <option value="FSFE">FSFE</option>
        <option value="VCFE">VCFE</option>
        <option value="POS">POS</option>
    </select>
</div>

<div class="campo">
    <label for="numeroFactura">Numero de la Factura</label>
    <input type="number" name="numeroFactura" id="numeroFactura">
</div>

<div class="campo">
    <label for="archivoGarantia">Archivo Fisico</label>
    <input type="file" name="archivoGarantia" id="archivoGarantia" accept="application/pdf">
</div>

<div class="campo">
    <label for="comentarios">Comentarios</label>
    <textarea name="comentarios" id="comentarios"></textarea>
</div>