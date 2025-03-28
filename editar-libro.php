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

                        <input class="input-login ancho-uniforme" type="text" name="titulo" value="<?php echo $fila['titulo_libro']; ?>" placeholder="Título del Libro" required>

                        <select name="autor" required class="input-login ancho-uniforme" >
                            <?php
                            $autores = mysqli_query($conectar, "SELECT * FROM autores");
                            while ($autor = mysqli_fetch_array($autores)) {
                                $selected = ($autor['ID_autor'] == $fila['autor']) ? 'selected' : '';
                                echo "<option value='{$autor['ID_autor']}' $selected>{$autor['nombre_autor']}</option>";
                            }
                            ?>
                        </select>

                        <input class="input-login ancho-uniforme" type="text" name="anio" value="<?php echo $fila['anio']; ?>" placeholder="Año de Publicación" required>

                        <input class="input-login ancho-uniforme" type="text" name="editorial" value="<?php echo $fila['editorial']; ?>" placeholder="Editorial" required>

                        <select name="carrera" required class="input-login ancho-uniforme" >
                            <?php
                            $carreras = mysqli_query($conectar, "SELECT * FROM carreras");
                            while ($carrera = mysqli_fetch_array($carreras)) {
                                $selected = ($carrera['ID_carrera'] == $fila['carrera']) ? 'selected' : '';
                                echo "<option value='{$carrera['ID_carrera']}' $selected>{$carrera['nombre_carrera']}</option>";
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
