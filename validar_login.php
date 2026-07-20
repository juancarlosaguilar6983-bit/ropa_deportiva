<?php
session_start();
require_once "conexion.php";

// Verificar que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.php");
    exit();
}

// Recibir datos
$usuario = trim($_POST["usuario"]);
$password = $_POST["password"];

// Validar campos vacíos
if (empty($usuario) || empty($password)) {

    echo "<script>
            alert('Completa todos los campos.');
            window.location='login.php';
          </script>";
    exit();
}

// Buscar usuario
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {

    $fila = $resultado->fetch_assoc();

    // Verificar contraseña
    if (password_verify($password, $fila["password"])) {

        // Crear sesión
        $_SESSION["id"] = $fila["id"];
        $_SESSION["nombre"] = $fila["nombre"];
        $_SESSION["usuario"] = $fila["usuario"];
        $_SESSION["rol"] = $fila["rol"];

        // Redirección según rol
        if ($fila["rol"] == "admin") {

            header("Location: admin/panel.php");
            exit();

        } else {

            header("Location: index.php");
            exit();

        }

    } else {

        echo "<script>
                alert('Contraseña incorrecta.');
                window.location='login.php';
              </script>";

    }

} else {

    echo "<script>
            alert('El usuario no existe.');
            window.location='login.php';
          </script>";

}

$stmt->close();
$conexion->close();
?>