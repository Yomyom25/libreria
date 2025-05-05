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
                    <h1 class="title">Vista de Libro</h1>
                </div>

                <div class="usuarios-vista">
                    <div class="btn">
                        <a class="btn-green btn-main" href="Libros.php">Regresar</a>
                    </div>

                        <div class="vista">
                    <?php
                        require "conn.php";

                        $id_libro = $_GET["id"];
                        $todos = "SELECT * FROM libros INNER JOIN autores ON libros.autor = autores.ID_autor 
                    INNER JOIN carreras ON libros.carrera = carreras.ID_carrera WHERE ID_libro = '$id_libro' ";

                        $resultado = mysqli_query($conectar, $todos);

                        $fila = $resultado -> fetch_array();
                        ?>
                        <p class='text-bold'>Nombre del libro:</p>
                        <p><?php echo $fila["titulo_libro"] ."<hr>";?></p>

                        <p class='text-bold'>Nombre del autor:</p>
                        <p><?php echo $fila["nombre_autor"]. "<br>"."<hr>"; ?></p>

                        <p class='text-bold'>Año de publicación:</p>
                        <?php echo $fila["anio"]. "<br>"."<hr>";?>

                        <p class='text-bold'>Editorial:</p>
                        <?php  echo $fila["editorial"]. "<br>"."<hr>"; ?>

                        <p class='text-bold'>Nombre de la carrera:</p>
                        <?php  echo $fila["nombre_carrera"]. "<br>"."<hr>"; ?>


                    <div class="btn">
                        <a class="btn-blue" href="editar-libro.php?id=<?php echo $fila['ID_libro']; ?>">Editar Libro</a>
                    </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</body>
</html>
