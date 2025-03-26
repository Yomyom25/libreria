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
            <?php
            require "conn.php";
            $id_carrera = $_GET["id"];

            $consulta = "SELECT * FROM carreras WHERE ID_carrera = '$id_carrera' ";
            $resultado = mysqli_query($conectar, $consulta);
            $fila = $resultado->fetch_array();
            ?>

            <section class="dashboard">
                <div class="tittle-div">
                    <h1 class="title">Editar Carrera</h1>
                </div>
                <div class="btn">
                    <a class="btn-green" href="ver-carrera.php?id=<?php echo $fila["ID_carrera"]; ?>">Regresar</a>
                </div>

                <div class="form-container">
                    <form action="guardar-editar_carrera.php" method="post">
                        <input class="input-login ancho-uniforme" value="<?php echo $fila['nombre_carrera'] ?>" type="text" name="nombre_carrera" placeholder="Nombre de la Carrera">
                        <input type="hidden" name="id_carrera" value="<?php echo $fila["ID_carrera"]; ?>">
                        <button class="btn-cuenta ancho-uniforme entrada-label" type="submit">Actualizar</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
