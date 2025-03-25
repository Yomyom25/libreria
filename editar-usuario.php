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
                <?php include "utils/header.php" ?>
            </header>
            <?php
            require "conn.php";
            $id_usuario = $_GET["id"];

            $todos = "SELECT * FROM usuarios WHERE ID = '$id_usuario' ";
            $resultado = mysqli_query($conectar, $todos);
            $fila = $resultado->fetch_array();
            ?>

            <section class="dashboard">
                <div class="tittle-div">
                    <h1 class="title">Editar usuario</h1>
                </div>
                <div class="btn">
                    <a class="btn-green" href="ver-usuario.php?id=<?php echo $fila["ID"]; ?>">Regresar</a>
                </div>

                <div class="form-container">
                    <form action="guardar-editar_usuario.php" method="post">

                        <input class="input-login ancho-uniforme" value="<?php echo $fila['nombre'] ?>" type="text" name="nombre" placeholder="Nombre(s)">
                        <input class="input-login ancho-uniforme" value="<?php echo $fila['apellido'] ?>" type="text" name="apellido" placeholder="Apellido">

                        <!-- arreglar el CSS -->
                        <div class="input-login correo">
                            <?php echo $fila['email'] ?>
                        </div>

                        <!-- <div class="input-login correo">
                            <?php echo $fila['contrasena'] ?>
                        </div> -->

                        <p class="entrada-label" for="birthdate">Fecha de nacimiento:</p>
                        <input class="input-login ancho-uniforme" value="<?php echo $fila['fecha_nacimiento'] ?>" type="date" name="fecha_nacimiento" required>

                        <input type="hidden" name="id" value="<?php echo $fila["ID"]; ?>">
                        <input type="hidden" name="email" value="<?php echo $fila["email"]; ?>">
                        <button class="btn-cuenta ancho-uniforme entrada-label" type="submit" value=>Actualizar</button>
                    </form>
                </div>

            </section>

        </div>
    </div>
</body>

</html>