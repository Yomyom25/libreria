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
                    <h1 class="title">Carreras</h1>
                </div>

                <div class="btn">
                    <a class="add-user" href="agregar-carrera.php">Crear Carrera</a>
                </div>

                <!-- Tabla de carreras -->
                <table class="tabla-usuarios">
                    <tr>
                        <th class="font-yellow">ID</th>
                        <th>Nombre</th>
                        <th class="font-yellow">Ver</th>
                        <th class="font-yellow">Editar</th>
                        <th class="font-yellow">Borrar</th>
                    </tr>
                    <?php
                    require "conn.php";

                    $todos = "SELECT * FROM carreras ORDER BY ID_carrera ASC";
                    $resultado = mysqli_query($conectar, $todos);
                    while ($fila = $resultado->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $fila["ID_carrera"] ?></td>
                            <td><?php echo $fila["nombre_carrera"] ?></td>
                            <td><a href="ver-carrera.php?id=<?php echo $fila["ID_carrera"]; ?>"><img class="img-tabla" src="img/see-icon.png" alt=""></a></td>
                            <td><a href="editar-carrera.php?id=<?php echo $fila["ID_carrera"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_carrera"]; ?>&tabla=carreras')">
                                    <img class="img-tabla" src="img/eliminar.png" alt="">
                                </a></td>

                        </tr>
                    <?php } ?>
                </table>
            </section>
        </div>
    </div>
    <script>
        // Función para validar la eliminación de una carrera
        function validarDelete(url) {
            var mensaje = confirm("¿Está seguro de eliminar esta carrera?");
            if (mensaje == true) {
                window.location = url;
            }
        }
    </script>
</body>

</html>