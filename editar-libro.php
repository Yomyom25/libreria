<?php
include "seguridad.php";
require "conn.php";

$id_libro = $_GET["id"];

// obtener datos del libro
$consulta = "SELECT * FROM libros WHERE ID_libro = '$id_libro'";
$resultado = mysqli_query($conectar, $consulta);
$fila = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <div class="flex-container">
        <div class="sidebar">
            <?php include "utils/nav-bar.php"; ?>
        </div>

        <div class="main-content">
            <header>
                <?php include "utils/header.php"; ?>
            </header>

            <section class="dashboard">
                <div class="tittle-div">
                    <h1 class="title">Editar Libro</h1>
                </div>

                <div class="btn">
                    <a class="btn-green" href="libros.php">Regresar</a>
                </div>

                <div class="form-container">
                    <form action="guardar-editar_libro.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $fila['ID_libro']; ?>">
                        <input type="hidden" name="titulo" value="<?php echo $fila['titulo_libro']; ?>">

                        <!-- título del libro (solo visible) -->
                        <div class="input-login correo">
                            <?php echo $fila['titulo_libro'] ?>
                        </div>

                        <!-- autores -->
                        <select name="autor" required class="input-login ancho-uniforme">
                            <?php
                            $variable_autor = $fila["autor"];
                            $verautor = "SELECT * FROM autores";
                            $resultadoautor = mysqli_query($conectar, $verautor);
                            while ($filautor = $resultadoautor->fetch_array()) {
                                ?>
                                <option value="<?php echo $filautor["ID_autor"]; ?>"
                                    <?php if ($filautor["ID_autor"] == $variable_autor) echo "selected"; ?>>
                                    <?php echo $filautor['nombre_autor'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <input class="input-login ancho-uniforme" type="text" name="anio" value="<?php echo $fila['anio']; ?>" placeholder="Año de Publicación" required>

                        <input class="input-login ancho-uniforme" type="text" name="editorial" value="<?php echo $fila['editorial']; ?>" placeholder="Editorial" required>

                        <!-- carreras -->
                        <select name="carrera" required class="input-login ancho-uniforme">
                            <?php
                            $variable_carrera = $fila["carrera"];
                            $vercarrera = "SELECT * FROM carreras";
                            $resultadocarrera = mysqli_query($conectar, $vercarrera);
                            while ($filcarrera = $resultadocarrera->fetch_array()) {
                                ?>
                                <option value="<?php echo $filcarrera["ID_carrera"]; ?>"
                                    <?php if ($filcarrera["ID_carrera"] == $variable_carrera) echo "selected"; ?>>
                                    <?php echo $filcarrera['nombre_carrera'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <input class="btn-cuenta ancho-uniforme entrada-label" type="submit" value="Actualizar">
                    </form>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
