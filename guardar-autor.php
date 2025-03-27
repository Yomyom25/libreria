<?php
require "seguridad.php";
require "conn.php";

// Capturar datos del formulario
$nombre_autor = $_POST['nombre_autor'];
$pais_autor = $_POST['pais_autor'];

// Validar si el autor ya existe
$verificar = mysqli_query($conectar, "SELECT * FROM autores WHERE nombre_autor = '$nombre_autor' AND pais_autor = '$pais_autor'");

if (mysqli_num_rows($verificar) > 0) {
    echo '<script>
    alert("El autor ya está registrado!");
    history.go(-1);
    </script>';
    exit();
}

// Insertar datos en la tabla autores
$insertar = "INSERT INTO autores (nombre_autor, pais_autor) VALUES ('$nombre_autor', '$pais_autor')";
$query = mysqli_query($conectar, $insertar);

// Mensajes de aviso
if ($query) {
    echo '<script>
    alert("Registro exitoso!");
    location.href = "autores.php"
    </script>';
} else {
    echo '<script>
    alert("Error al registrar!");
    location.href = "agregar-autor.php"
    </script>';
}
?>
