<?php
require "seguridad.php";
require "conn.php";

$id = $_GET["id"];
$tabla = $_GET["tabla"];

$tablas_permitidas = ["usuarios", "autores", "carreras"];

if (!in_array($tabla, $tablas_permitidas)) {
    die("Operación no permitida");
}

$columna_id = [
    "usuarios" => "ID",
    "autores" => "ID_autor",
    "carreras" => "ID_carrera"
];

$eliminar = "DELETE FROM $tabla WHERE {$columna_id[$tabla]} = '$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header("location: $tabla.php");
} else {
    echo "No se pudo eliminar el registro";
}
?>
