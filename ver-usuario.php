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
                    <h1 class="title">Vista de usuarios</h1>
                </div>

                <div class="usuarios-vista">
                    <div class="btn">
                        <a class="btn-green btn-main" href="usuario.php">Regresar</a>
                    </div>

                        <div class="vista">
                    <?php
                        require "conn.php";

                        $id_usuario = $_GET["id"];
                        $todos = "SELECT * FROM usuarios WHERE ID = '$id_usuario' ";

                        $resultado = mysqli_query($conectar, $todos);

                        $fila = $resultado -> fetch_array();
                        ?>
                        <p class='text-bold'>Nombre del usuario:</p>
                        <p><?php echo $fila["nombre"]. "&nbsp;". $fila["apellido"] ."<hr>";?></p>

                        <p class='text-bold'>Correo electronico:</p>
                        <p><?php echo $fila["email"]. "<br>"."<hr>"; ?></p>

                        <p class='text-bold'>Contraseña:</p>
                        <?php echo $fila["contrasena"]. "<br>"."<hr>";?>

                        <p class='text-bold'>Fecha de nacimiento:</p>
                        <?php  echo $fila["fecha_nacimiento"]. "<br>"."<hr>"; ?>

                    <div class="btn">
                        <a class="btn-blue" href="editar-usuario.php?id=<?php echo $fila['ID']; ?>">Editar Usuario</a>
                    </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</body>
</html>
