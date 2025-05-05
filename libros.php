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
                    <a class="btn-green" href="libros.php">Todos los libros</a>
                </div>
                <!-- buscador -->
                <div class="div-buscador">
                    <form action="libros.php" method="post">
                        <input class="buscador" type="text" name="buscar_titulo">
                        <button class="btn_buscar" name="buscar">Buscar</button>
                    </form>
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

                    if (isset($_POST['buscar']) and $_POST['buscar_titulo']) {
                        $titulo = $_POST['buscar_titulo'];

                        $todos = "SELECT * FROM libros INNER JOIN autores ON libros.autor = autores.ID_autor 
                            INNER JOIN carreras ON libros.carrera = carreras.ID_carrera WHERE titulo_libro Like '%$titulo%' ";
                        $resultado = mysqli_query($conectar, $todos);
                        while ($fila = $resultado->fetch_array()) {
                    ?>
                            <tr>
                                <td><?php echo $fila["ID_libro"] ?></td>
                                <td><?php echo $fila["titulo_libro"] ?></td>
                                <td><?php echo $fila["nombre_autor"] ?></td>
                                <td><?php echo $fila["anio"] ?></td>
                                <td><?php echo $fila["editorial"] ?></td>
                                <td><?php echo $fila["nombre_carrera"] ?></td>
                                <td><a href="ver-libro.php?id=<?php echo $fila["ID_libro"]; ?>"><img class="img-tabla" src="img/see-icon.png" alt=""></a></td>
                                <td><a href="editar-libro.php?id=<?php echo $fila["ID_libro"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                                <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_libro"]; ?>&tabla=libros')">
                                        <img class="img-tabla" src="img/eliminar.png" alt="">
                                    </a></td>
                            </tr>
                        <?php
                        }
                        if ($resultado->num_rows == 0) {
                        ?>
                            <tr>
                                <td class="alerta" colspan="9">NO HAY RESULTADOS</td>
                            </tr>
                    <?php
                        }
                    } else {

                        // paginacion
                        $por_pagina = 5;
                        if (isset($_GET['pagina'])) {
                            $pagina_actual = $_GET['pagina'];
                        } else {
                            $pagina_actual = 1;
                        }
                        $inicio = ($pagina_actual - 1) * $por_pagina;
                        $sql_pag = "SELECT * FROM libros LIMIT $inicio, $por_pagina";
                        $resultado = mysqli_query($conectar, $sql_pag);

                        $todos = "SELECT * FROM libros INNER JOIN autores ON libros.autor = autores.ID_autor 
                        INNER JOIN carreras ON libros.carrera = carreras.ID_carrera LIMIT $inicio, $por_pagina";
                    $resultado = mysqli_query($conectar, $todos);
                    while ($fila = $resultado->fetch_array()) {
                ?>
                        <tr>
                            <td><?php echo $fila["ID_libro"] ?></td>
                            <td><?php echo $fila["titulo_libro"] ?></td>
                            <td><?php echo $fila["nombre_autor"] ?></td>
                            <td><?php echo $fila["anio"] ?></td>
                            <td><?php echo $fila["editorial"] ?></td>
                            <td><?php echo $fila["nombre_carrera"] ?></td>
                            <td><a href="ver-libro.php?id=<?php echo $fila["ID_libro"]; ?>"><img class="img-tabla" src="img/see-icon.png" alt=""></a></td>
                            <td><a href="editar-libro.php?id=<?php echo $fila["ID_libro"]; ?> "><img class="img-tabla" src="img/editar.png" alt=""></a></td>
                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_libro"]; ?>&tabla=libros')">
                                    <img class="img-tabla" src="img/eliminar.png" alt="">
                                </a></td>
                        </tr>
                    <?php
                    }
                    }
                    ?>

                </table>
<br>
                <div class="div-number">
                    <?php
                    $sql_total = "SELECT COUNT(*) as total FROM libros";
                    $resultado_total = mysqli_query($conectar, $sql_total);

                    $fila_total = $resultado_total -> fetch_assoc();
                    $total_registros = $fila_total['total'];

                    //celi es hacia arriba
                    $total_paginas = ceil($total_registros / $por_pagina);

                    for ($i=1; $i <= $total_paginas ; $i++) {
                        echo "<a href='?paginas=$i'>$i</a>";
                    }
                    ?>
                </div>

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