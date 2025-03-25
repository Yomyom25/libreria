<?php 
require "seguridad.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="div-1200px">
        <div class="salir">
            <?php 
            include "linea-salir.php"
            ?>
        </div>
        <div class="menu">
            <?php 
            include "dashboard.php"
            ?>
        </div>

        <div class="contenedor">
            <h1 class="titulo">Usuarios</h1>
            <br>
            <a class="add-user" href="crear_usuario.php">Crear Usuario</a>
            <br>

        <!-- Tabla de usuarios -->
            <table class="tabla-usuarios">
                <tr>
                    <th class="yellow">ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th class="yellow">Ver</th>
                    <th class="yellow">Editar</th>
                    <th class="yellow">Borrar</th>
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
                    <td><a href=""><img class="img-tabla"  src="img/see-icon.png" alt=""></a></td>
                    <td><a href=""><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                    <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID"];?>')"><img class="img-tabla" src="img/eliminar.png" alt=""></a></td>
                </tr>
                <?php }?>

            </table>
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