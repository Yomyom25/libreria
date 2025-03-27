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

            <section class="dashboard">
                <div class="tittle-div">
                    <h1 class="title">Libros</h1>
                </div>

                <div class="btn">
                    <a class="add-user" href="agregar-libro.php">Agregar Libro</a>
                </div>


                <!-- Tabla de usuarios -->
                <table class="tabla-usuarios">
                    <tr>
                        <th class="font-yellow">ID</th>
                        <th>titulo del libro</th>
                        <th>Autor</th>
                        <th>Año de publicación</th>
                        <th>Editorial</th>
                        <th>Carrera</th>
                        <th class="font-yellow">Ver</th>
                        <th class="font-yellow">Editar</th>
                        <th class="font-yello">Borrar</th>
                    </tr>
                    <?php
                    require "conn.php";

                    $todos = "SELECT * FROM libros ORDER BY ID_libro ASC";
                    $resultado = mysqli_query($conectar, $todos);
                    while ($fila = $resultado->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $fila["ID_libro"] ?></td>
                            <td><?php echo $fila["titulo_libro"] ?></td>
                            <td><?php echo $fila["autor"]?></td>
                            <td><?php echo $fila["anio"] ?></td>
                            <td><?php echo $fila["editorial"] ?></td>
                            <td><?php echo $fila["carrera"] ?></td>
                            <td><a href="ver-libro.php?id=<?php echo $fila["ID_libro"]; ?>"><img class="img-tabla" src="img/see-icon.png" alt=""></a></td>
                            <td><a href="editar-libro.php?id=<?php echo $fila["ID_libro"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_libro"]; ?>&tabla=libros')">
                                    <img class="img-tabla" src="img/eliminar.png" alt="">
                                </a></td>

                        </tr>
                    <?php } ?>

                </table>

            </section>

        </div>
    </div>
    <script>
        // Funcion para validar el formulario de crear usuario
        function validarDelete(url) {
            var mensaje = confirm("¿Está seguro de eliminar este libro?");
            if (mensaje == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>