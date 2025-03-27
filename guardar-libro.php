<?php
require "seguridad.php";
require "conn.php";

// Capturar datos del formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$año = $_POST['anio'];
$editorial = $_POST['editorial'];
$carrera = $_POST['carrera'];

echo $titulo . "<br>";
echo $autor . "<br>";
echo $editorial . "<br>";
echo $carrera . "<br>";
echo $año . "<br>";
?>
