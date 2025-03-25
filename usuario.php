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
                    <h1 class="title">Usuarios</h1>
                </div>

                <div class="btn">
                    <a class="add-user" href="agregar-usuario.php">Crear Usuario</a>
                </div>


        <!-- Tabla de usuarios -->
            <table class="tabla-usuarios">
                <tr>
                    <th class="font-yellow">ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th class="font-yellow">Ver</th>
                    <th class="font-yellow">Editar</th>
                    <th class="font-yello">Borrar</th>
                </tr>
                <?php
            require "conn.php";

            $todos = "SELECT * FROM usuarios ORDER BY id ASC";
            $resultado = mysqli_query($conectar, $todos);
            while ($fila = $resultado -> fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $fila["ID"] ?></td>
                    <td><?php echo $fila["nombre"] ?></td>
                    <td><?php echo $fila["apellido"] ?></td>
                    <td><?php echo $fila["email"] ?></td>
                    <td><a href="ver-usuario.php?id=<?php echo $fila["ID"]; ?>"><img class="img-tabla"  src="img/see-icon.png" alt=""></a></td>
                    <td><a href="editar-usuario.php?id=<?php echo $fila["ID"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                    <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID"];?>')"><img class="img-tabla" src="img/eliminar.png" alt=""></a></td>
                </tr>
                <?php }?>

            </table>

            </section>

        </div>
    </div>
    <script>
        // Funcion para validar el formulario de crear usuario
        function validarDelete(url) {
            var mensaje = confirm("¿Está seguro de eliminar este usuario?");
            if (mensaje == true) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
