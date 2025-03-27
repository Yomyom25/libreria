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
                    <h1 class="title">Registrar Nuevo Libro</h1>
                </div>

                <div class="btn">
                    <a class="btn-green" href="libros.php">Regresar</a>
                </div>

                <div class="form-container">
                    <form action="guardar-libro.php" method="post">

                        <input class="input-login ancho-uniforme" type="text" id="titulo" name="titulo" placeholder=" Titulo del Libro" maxlength="100">
                        <select class="input-login ancho-uniforme" name="autor" id="autor">
                            <option value="" selected> Escoge tu autor</option>
                            <?php
                            require "conn.php";

                            $query = "SELECT * FROM autores";
                            $resultado = mysqli_query($conectar, $query);

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                    <option value="<?php echo $fila['ID_autor']; ?>"> <?php echo $fila['nombre_autor']?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <input class="input-login ancho-uniforme" type="text" id="anio" name="anio" placeholder=" Año de Publicación " maxlength="4">
                        <input class="input-login ancho-uniforme" type="text" id="editorial" name="editorial" placeholder="editorial" maxlength="100">

                        <select class="input-login ancho-uniforme" name="carrera" id="carrera">
                        <option value="" selected> Escoge la carrera</option>
                            <?php
                            require "conn.php";

                            $query = "SELECT * FROM carreras";
                            $resultado = mysqli_query($conectar, $query);

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                    <option value="<?php echo $fila['ID_carrera']; ?>"> <?php echo $fila['nombre_carrera']?></option>
                                <?php
                                }
                            ?>
                        </select>
                        </select>
                        <input class="btn-cuenta ancho-uniforme entrada-label" type="submit" value="Agregar">
                    </form>
                </div>

            </section>

        </div>
    </div>
</body>

</html>