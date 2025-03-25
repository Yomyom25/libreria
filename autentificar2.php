<?php
require "conn.php";
session_start(); // asegúrate de iniciar la sesión al comienzo

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // quitar espacios en blanco
    $email = trim($_POST["email"]);
    $contrasena = trim($_POST["contrasena"]);
    
    // validar la existencia del usuario
    if (!empty($email) && !empty($contrasena)) {

        // evitar inyección SQL
        $consulta = $conectar->prepare("SELECT contrasena FROM usuarios WHERE email = ? LIMIT 1");
        $consulta->bind_param("s", $email);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $password = $fila["contrasena"];

            if (password_verify($contrasena, $password)) {
                setcookie("tiempo_inicio", time(), time() + 1, "/");

                $_SESSION["autentificado"] = "SI";
                $_SESSION["username"] = $email;

                header("Location: principal2.php");
                exit; // detener la ejecución después de la redirección
            } else {
                echo '
                    <script>
                    alert("Contraseña incorrecta");
                    location.href = "index.php";
                    </script>
                ';
                exit;
            }
        } else {
            echo '
                <script>
                alert("El usuario no existe");
                location.href = "index.php";
                </script>
            ';
            exit;
        }

        $resultado->free();
    } else {
        echo '
            <script> 
            alert("Por favor completa todos los campos");
            history.go(-1);
            </script>
        ';
        exit;
    }
}

$conectar->close();
