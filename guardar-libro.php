<?php
require "seguridad.php";
require "conn.php";

// capturar datos del formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$editorial = $_POST['editorial'];
$carrera = $_POST['carrera'];

// validar si el libro ya existe
$verificar = mysqli_query($conectar, "SELECT * FROM libros WHERE titulo_libro = '$titulo' AND autor = '$autor'");

if (mysqli_num_rows($verificar) > 0) {
    echo '<script>
    alert("el libro ya está registrado!");
    history.go(-1);
    </script>';
    exit();
}

// consulta sql para insertar los datos en la tabla libros
$insertar = "INSERT INTO libros (titulo_libro, autor, anio, editorial, carrera) 
            VALUES ('$titulo', '$autor', '$anio', '$editorial', '$carrera')";

// ejecutar la consulta
$query = mysqli_query($conectar, $insertar);

// mensaje de éxito o error
if ($query) {
    echo '<script>
    alert("libro agregado correctamente!");
    location.href = "libros.php";
    </script>';
} else {
    echo '<script>
    alert("error al agregar el libro!");
    history.go(-1);
    </script>';
}
