<?php
require "seguridad.php";
require "conn.php";

// Capturar datos del formulario
$nombre_carrera = $_POST['nombre_carrera'];

// Validar si la carrera ya existe
$verificar = mysqli_query($conectar, "SELECT * FROM carreras WHERE nombre_carrera = '$nombre_carrera'");

if (mysqli_num_rows($verificar) > 0) {
    echo '<script>
    alert("La carrera ya está registrada!");
    history.go(-1);
    </script>';
    exit();
}

// Insertar datos en la tabla carreras
$insertar = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre_carrera')";
$query = mysqli_query($conectar, $insertar);

// Mensajes de aviso
if ($query) {
    echo '<script>
    alert("Registro exitoso!");
    location.href = "carreras.php"
    </script>';
} else {
    echo '<script>
    alert("Error al registrar!");
    location.href = "agregar-carrera.php"
    </script>';
}
?>
