<?php
require "seguridad.php";
require "conn.php";

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$editorial = $_POST['editorial'];
$carrera = $_POST['carrera'];

// actualizar los datos del libro
$actualizar = "UPDATE libros 
               SET titulo_libro='$titulo', autor='$autor', anio='$anio', editorial='$editorial', carrera='$carrera' 
               WHERE ID_libro='$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '<script>
    alert("Libro actualizado correctamente!");
    location.href = "libros.php";
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el libro!");
    history.go(-1);
    </script>';
}
?>
