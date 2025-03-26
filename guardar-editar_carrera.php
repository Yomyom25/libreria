<?php 
require "seguridad.php";
require "conn.php";

$id_carrera = $_POST['id_carrera'];
$nombre_carrera = $_POST['nombre_carrera'];

$actualizar = "UPDATE carreras SET nombre_carrera='$nombre_carrera' WHERE ID_carrera='$id_carrera'";

$query = mysqli_query($conectar, $actualizar);

if($query){
    echo '<script>
    alert("Carrera actualizada correctamente!");
    location.href = "carreras.php"
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar la carrera!");
    location.href = "editar-carrera.php?id='. $id_carrera.'"
    </script>';
}
?>
