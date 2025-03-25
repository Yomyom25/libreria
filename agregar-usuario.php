<?php 
include "seguridad.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <div class="flex-container">
        <div class="sidebar">
            <?php 
            include "utils/nav-bar.php"
            ?>

        </div>

        <div class="main-content">
            <header>
                <?php include "utils/header.php"?>
            </header>

            <section class="dashboard">
                <div class="tittle-div">
                    <h1 class="title">Registrar Usuario</h1>
                </div>

                <div class="btn">
                    <a class="btn-green" href="usuario.php">Regresar</a>
                </div>

                <div class="form-container">
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

            </section>

        </div>
    </div>
</body>
</html>
