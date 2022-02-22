<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FF Soluciones S.A</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

<div class="todo">

    <header class="header">
        <div class="logo">
            <picture>
                <source srcset="/build/img/logoff.webp" type="image/webp">
                <source srcset="/build/img/logoff.jpg" type="image/jpeg">
                <img src="/build/img/logoff.jpg">
            </picture>
        </div>

        <div class="perfil">
            <?php if(isset($_SESSION['login'])){ ?>
                <p>Asesor: <?php echo $_SESSION['nombre']; ?></p>
                <p><?php echo $_SESSION['correo']; ?></p>
            <?php  } ?>
        </div>

        <?php
            if(isset($_SESSION['login'])){?> 
        <div class="iconos">
            <a href="/logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
            </a>
        </div>

        <?php }?>
    </header>

    <div class="cuerpo">

        <div class="navegacion">
        <?php if(isset($_SESSION['login'])){ 
            include_once __DIR__ .'/templates/navegacion.php';    
            } 
        ?>
    
        </div>

        <div class="central">

            <?php if(isset($_SESSION['login'])) {?>
                <h2>Bienvenido <?php echo $_SESSION['nombre']; ?></h2>    
            <?php } ?>

            <div class="contenido">
                <?php echo $contenido ?>
            </div>
        </div>


    </div>

</div>

<?php echo $script ?? null ?>

    
</body>
</html>

                