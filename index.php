<?php
session_start(); // asegurarse de que la sesión esté iniciada

if (isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] === "SI") {
    header("Location: principal2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="div-1200px">

        <div class="img-logo">
            <a href="index.php">
                <img class="logo" src="img/logo1.jpg" alt="Logo">
            </a>
        </div>

        <div class="background_login">
            <h1>Login</h1>
            <form action="autentificar2.php" method="post" name="login_plantilla">
                <?php
                if (isset($_GET["errorusuario"]) && $_GET["errorusuario"] === "SI") {
                    echo "<p class='error'>Usuario o contraseña incorrectos</p>";
                }
                ?>
                <input type="text" name="email" placeholder="Correo Electrónico" class="input-login ancho-uniforme">
                <input type="password" name="contrasena" placeholder="Contraseña" class="input-login ancho-uniforme">
                <br>
                <input type="submit" value="Iniciar sesión" class="btn-login ancho-uniforme btn">
            </form>

            <hr>

            <input type="button" value="Crear una cuenta" class="btn-cuenta btn" onclick="window.location.href='registro.php';">
        </div>

        <div class="footer">
            <span class="letra-footer"> © <?php echo date("Y"); ?> Todos los Derechos Reservados <a href="#" class="letra-footer">uwu</a></span>
        </div>

    </div>

    <script src="scripts/validacion.js"></script>
</body>

</html>