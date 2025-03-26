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
                    <h1 class="title">Registrar Autor</h1>
                </div>

                <div class="btn">
                    <a class="btn-green" href="autores.php">Regresar</a>
                </div>

                <div class="form-container">
                <form action="guardar-autor.php" method="post">
                    <input class="input-login ancho-uniforme" type="text" id="nombre_autor" name="nombre_autor" placeholder="Nombre del Autor" required>
                    <input class="input-login ancho-uniforme" type="text" id="pais_autor" name="pais_autor" placeholder="País de Origen" required>
                    <input class="btn-cuenta ancho-uniforme entrada-label" type="submit" value="Registrar">
                </form>
                </div>

            </section>

        </div>
    </div>
</body>
</html>
