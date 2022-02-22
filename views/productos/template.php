<?php 

use Model\Producto;

$medidores =  Producto::categorizar('medidores');
$macros =  Producto::categorizar('macromedidores');
$electrosCAB =  Producto::categorizar('medidores electromagneticos CONTROLAGUA BATERIA');
$electrosSB =  Producto::categorizar('medidores electromagneticos SIEMENS BATERIA');
$electrosCAR =  Producto::categorizar('medidores electromagneticos CONTROLAGUA REMOTO');
$Accelectros =  Producto::categorizar('accesorios medidores electromagneticos');
$cajas =  Producto::categorizar('cajas');
$tapas =  Producto::categorizar('tapas');
$registros =  Producto::categorizar('registros pcp');
$Rcontrolagua =  Producto::categorizar('registros controlagua');
$Vcontrolagua =  Producto::categorizar('valvulas hd controlagua');
$Acontrolagua =  Producto::categorizar('accesorios hd controlagua');
$Hapolo =  Producto::categorizar('hidrantes Apolo');
$Uhd =  Producto::categorizar('uniones hd');
$Ahd =  Producto::categorizar('adaptadores hd');
$tuboP =  Producto::categorizar('tuberia pvc presion PAVCO');
$AtuboP =  Producto::categorizar('accesorios pvc presion PAVCO');
$tuboS =  Producto::categorizar('tuberia pvc sanitaria PAVCO');
$AtuboS =  Producto::categorizar('accesorios pvc sanitaria PAVCO');

function mostrarImagen($objeto){

    
    $data = file_get_contents('imagenes/'.$objeto->imagen);
    
    $base64 = 'data:image/jpg;base64,' . base64_encode($data);
    
    return $base64;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas de precios FF SOLUCIONES SAS <?php echo date('Y'); ?> </title>
    <style>
        @page {
            margin: auto;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h2, h3 {
            text-align: center;
            font-weight: 700;
        }

        h2 {
            font-size: 30px;
        }

        h3 {
            font-size: 25px;
        }
        
        table {
            margin: 0 auto;
            width: 95%;
        }

        table thead th {
            color: #f0f0f0;
            padding: 10px;
            background-color: #3f76b5;
        }

        table th {
            font-weight: 700;
            font-size: 25px;
        }

        table td {
            font-size: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        table td img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<h2>Listas de Precios FF Soluciones S.A <i><?php 
    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
    echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
?> </i></h2>

<!--Medidores Volumetricos Y Velocidad -->

<div class="tabla">

<h3>Medidores Volumetricos y Velocidad</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($medidores as $medidor): ?>
        <tr>
            <td><?php echo $medidor->codigo; ?></td>
            <td><?php echo $medidor->nombre;?></td>
            <td><img src="<?php echo mostrarImagen($medidor) ?>" ></td>
            <td><?php echo $medidor->diametro; ?></td>
            <td>$.<?php echo number_format($medidor->precio, 2); ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>

<!-- Macromedidores -->

<h3>Macromedidores</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($macros as $macro): ?>
        <tr>
            <td><?php echo $macro->codigo ?></td>
            <td><?php echo $macro->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($macro) ?>"></td>
            <td><?php echo $macro->diametro ?></td>
            <td>$.<?php echo number_format($macro->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Electromagneticos -->

<h3>Macromedidores Electromagneticos CONTROLAGUA BATERIA</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($electrosCAB as $electroCAB): ?>
        <tr>
            <td><?php echo $electroCAB->codigo ?></td>
            <td><?php echo $electroCAB->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($electroCAB) ?>"></td>
            <td><?php echo $electroCAB->diametro ?></td>
            <td>$.<?php echo number_format($electroCAB->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Electromagneticos SIEMENS BATERIA-->

<h3>Macromedidores Electromagneticos SIEMENS BATERIA</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($electrosSB as $electroSB): ?>
        <tr>
            <td><?php echo $electroSB->codigo ?></td>
            <td><?php echo $electroSB->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($electroSB) ?>"></td>
            <td><?php echo $electroSB->diametro ?></td>
            <td>$.<?php echo number_format($electroSB->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Electromagneticos -->

<h3>Macromedidores Electromagneticos CONTROLAGUA REMOTO</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($electrosCAR as $electroCAR): ?>
        <tr>
            <td><?php echo $electroCAR->codigo ?></td>
            <td><?php echo $electroCAR->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($electroCAR) ?>"></td>
            <td><?php echo $electroCAR->diametro ?></td>
            <td>$.<?php echo number_format($electroCAR->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<!-- Cajas -->

<h3>Cajas</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cajas as $caja): ?>
        <tr>
            <td><?php echo $caja->codigo ?></td>
            <td><?php echo $caja->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($caja) ?>"></td>
            <td><?php echo $caja->diametro ?></td>
            <td>$.<?php echo number_format($caja->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Tapas -->

<h3>Tapas</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tapas as $tapa): ?>
        <tr>
            <td><?php echo $tapa->codigo ?></td>
            <td><?php echo $tapa->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($tapa) ?>"></td>
            <td><?php echo $tapa->diametro ?></td>
            <td>$.<?php echo number_format($tapa->precio, 2) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<!-- Registros PCP -->

<h3>Registros PCP</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($registros as $registro): ?>
        <tr>
            <td><?php echo $registro->codigo ?></td>
            <td><?php echo $registro->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($registro) ?>"></td>
            <td><?php echo $registro->diametro ?></td>
            <td>$.<?php echo number_format($registro->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Registros Controlagua -->

<h3>Registros ControlAgua</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Rcontrolagua as $R): ?>
        <tr>
            <td><?php echo $R->codigo ?></td>
            <td><?php echo $R->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($R) ?>"></td>
            <td><?php echo $R->diametro ?></td>
            <td>$.<?php echo number_format($R->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Valvulas Controlagua -->

<h3>Valvulas Controlagua</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Vcontrolagua as $V): ?>
        <tr>
            <td><?php echo $V->codigo ?></td>
            <td><?php echo $V->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($V) ?>"></td>
            <td><?php echo $V->diametro ?></td>
            <td>$.<?php echo number_format($V->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Accesorios Controlagua -->

<h3>Accesorios Controlagua</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Acontrolagua  as $A): ?>
        <tr>
            <td><?php echo $A->codigo ?></td>
            <td><?php echo $A->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($A) ?>"></td>
            <td><?php echo $A->diametro ?></td>
            <td>$.<?php echo number_format($A->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Hidrantes Apolo-->

<h3>Hidrantes Apolo</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Hapolo as $H): ?>
        <tr>
            <td><?php echo $H->codigo ?></td>
            <td><?php echo $H->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($H) ?>"></td>
            <td><?php echo $H->diametro ?></td>
            <td>$.<?php echo number_format($H->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Uniones HD -->

<h3>Uniones HD</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Uhd as $U): ?>
        <tr>
            <td><?php echo $U->codigo ?></td>
            <td><?php echo $U->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($U) ?>"></td>
            <td><?php echo $U->diametro ?></td>
            <td>$.<?php echo number_format($U->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Accesorios HD -->

<h3>Accesorios HD</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Ahd as $AH): ?>
        <tr>
            <td><?php echo $AH->codigo ?></td>
            <td><?php echo $AH->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($AH) ?>"></td>
            <td><?php echo $AH->diametro ?></td>
            <td>$.<?php echo number_format($AH->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Uniones HD -->

<h3>Uniones HD</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($Uhd as $U): ?>
        <tr>
            <td><?php echo $U->codigo ?></td>
            <td><?php echo $U->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($U) ?>"></td>
            <td><?php echo $U->diametro ?></td>
            <td>$.<?php echo number_format($U->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!--  Tuberia PVC Presion -->

<h3> Tuberia PVC Presion</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tuboP as $tp): ?>
        <tr>
            <td><?php echo $tp->codigo ?></td>
            <td><?php echo $tp->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($tp) ?>"></td>
            <td><?php echo $tp->diametro ?></td>
            <td>$.<?php echo number_format($tp->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Accesorios PVC P -->

<h3>Accesorios PVC P</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($AtuboP as $AP): ?>
        <tr>
            <td><?php echo $AP->codigo ?></td>
            <td><?php echo $AP->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($AP) ?>"></td>
            <td><?php echo $AP->diametro ?></td>
            <td>$.<?php echo number_format($AP->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Tuberia PVC Sanitaria -->

<h3>Tuberia PVC Sanitaria</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tuboS as $tS): ?>
        <tr>
            <td><?php echo $tS->codigo ?></td>
            <td><?php echo $tS->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($tS) ?>"></td>
            <td><?php echo $tS->diametro ?></td>
            <td>$.<?php echo number_format($tS->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Accesorios PVC S -->

<h3>Accesorios PVC S</h3>

<table>
    <thead>
        <tr>
            <th>Codigo o Referencia</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Diametro</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($AtuboS as $AS): ?>
        <tr>
            <td><?php echo $AS->codigo ?></td>
            <td><?php echo $AS->nombre ?></td>
            <td><img src="<?php echo mostrarImagen($AS) ?>"></td>
            <td><?php echo $AS->diametro ?></td>
            <td>$.<?php echo number_format($AS->precio, 2)?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>








</body>
</html>
