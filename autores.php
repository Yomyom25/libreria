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
                    <h1 class="title">Autores</h1>
                </div>

                <div class="btn">
                    <a class="add-user" href="agregar-autor.php">Crear Autor</a>
                </div>

                <!-- Tabla de autores -->
                <table class="tabla-usuarios">
                    <tr>
                        <th class="font-yellow">ID</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th class="font-yellow">Ver</th>
                        <th class="font-yellow">Editar</th>
                        <th class="font-yellow">Borrar</th>
                    </tr>
                    <?php
                    require "conn.php";

                    $todos = "SELECT * FROM autores ORDER BY ID_autor ASC";
                    $resultado = mysqli_query($conectar, $todos);
                    while ($fila = $resultado->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $fila["ID_autor"] ?></td>
                            <td><?php echo $fila["nombre_autor"] ?></td>
                            <td><?php echo $fila["pais_autor"] ?></td>
                            <td><a href="ver-autor.php?id=<?php echo $fila["ID_autor"]; ?>"><img class="img-tabla" src="img/see-icon.png" alt=""></a></td>
                            <td><a href="editar-autor.php?id=<?php echo $fila["ID_autor"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_autor"]; ?>&tabla=autores')">
                                    <img class="img-tabla" src="img/eliminar.png" alt="">
                                </a></td>

                        </tr>
                    <?php } ?>
                </table>
            </section>
        </div>
    </div>
    <script>
        // Función para validar la eliminación de un autor
        function validarDelete(url) {
            var mensaje = confirm("¿Está seguro de eliminar este autor?");
            if (mensaje == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>