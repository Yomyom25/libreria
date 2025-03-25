<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Registrate</title>
</head>
<body>
    <div class="div-1200px">
        <div class="img-logo">
            <a href="index.php">
            <img class="logo" src="img/Logo_del_Instituto_Tecnológico_de_Mérida.svg.png" alt="Logo">
            </a>
        </div>

        <div class="div-form background_login">
            <h1>Registrate</h1>
            <form action="guardar_usuario.php" method="post">

        <input class="input-login ancho-uniforme" type="text" id="name" name="nombre" placeholder="Nombre(s)" >

        <input class="input-login ancho-uniforme" type="text" id="last_name" name="apellido" placeholder="Apellido" >

        <input class="input-login ancho-uniforme" type="email" id="email" name="email" placeholder="Correo electronico" >

        <input class="input-login ancho-uniforme" type="text" id="password" name="contrasena" placeholder="contraseña" maxlength="10" >
 
        <label for="birthdate">Fecha de nacimiento:</label>
        <input class="input-login ancho-uniforme" type="date" id="birthdate" name="fecha_nacimiento" required>

        <input class="btn-cuenta ancho-uniforme" type="submit" value="registrar">
    <br>
        <span class="text-small">Al hacer click en "registrar", aceptas los <a href="">Términos y condiciones</a> y la <a href="">Política de datos</a> y la <a href="">Política de cookies</a>. Es posible que te enviemos notificaciones por SMS, que puedes desactivar cuando quieras</span>
    </form>
        </div>
        <div class="footer">
        <span class="letra-footer"> © <?php echo date ("Y")?> Todos los Derechos Reservados <a href="_blank" class="letra-footer">uwu</a></span>
    </div>

    </div>
</body>
</html>