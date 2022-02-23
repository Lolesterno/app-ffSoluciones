<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

<div class="todo">

    <div class="contenido">
        <?php echo $contenido ?>
    </div>

</div>

<?php echo $script ?? null ?>

    
</body>
</html>

                