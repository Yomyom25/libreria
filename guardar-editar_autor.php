<?php 
require "seguridad.php";
require "conn.php";

$id_autor = $_POST['id_autor'];
$nombre_autor = $_POST['nombre_autor'];
$pais_autor = $_POST['pais_autor'];

$actualizar = "UPDATE autores SET nombre_autor='$nombre_autor', pais_autor='$pais_autor' WHERE ID_autor='$id_autor'";

$query = mysqli_query($conectar, $actualizar);

if($query){
    echo '<script>
    alert("Autor actualizado correctamente!");
    location.href = "autores.php"
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el autor!");
    location.href = "editar-autor.php?id='. $id_autor.'"
    </script>';
}

?>
