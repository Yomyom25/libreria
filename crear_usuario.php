<?php 
require "seguridad.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <div class="div-1200px">
        <div class="salir">
            <?php 
            include "linea-salir.php"
            ?>
        </div>
    <div class="menu">
        <?php include "dashboard.php"?>
    </div>

    <div class="contenedor">
        <h1 class="titulo">Crear Usuario</h1>

        <a class="btn-green" href="usuarios.php">Regresar</a>
        <div class="div-form">
            <form action="guardar-crear_usuario.php" method="post">

        <input class="input-login ancho-uniforme" type="text" id="name" name="nombre" placeholder="Nombre(s)" >

        <input class="input-login ancho-uniforme" type="text" id="last_name" name="apellido" placeholder="Apellido" >

        <input class="input-login ancho-uniforme" type="email" id="email" name="email" placeholder="Correo electronico" >

        <input class="input-login ancho-uniforme" type="text" id="password" name="contrasena" placeholder="contraseña" maxlength="10" >
 
        <p class="entrada-label" for="birthdate">Fecha de nacimiento:</p>
        <input class="input-login ancho-uniforme" type="date" id="birthdate" name="fecha_nacimiento" required>

        <input class="btn-cuenta ancho-uniforme entrada-label" type="submit" value="registrar">
    </form>
        </div>
    </div>
    </div>
</body>
</html>