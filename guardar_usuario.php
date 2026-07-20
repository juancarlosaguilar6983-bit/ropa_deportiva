<?php
session_start();
require_once "conexion.php";

// Verificar que el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: registro.php");
    exit();
}

// Recibir datos
$nombre = trim($_POST["nombre"]);
$apellido_paterno = trim($_POST["apellido_paterno"]);
$apellido_materno = trim($_POST["apellido_materno"]);
$correo = trim($_POST["correo"]);
$usuario = trim($_POST["usuario"]);
$password = $_POST["password"];
$confirmar = $_POST["confirmar"];

// Verificar campos obligatorios
if (
    empty($nombre) ||
    empty($apellido_paterno) ||
    empty($correo) ||
    empty($usuario) ||
    empty($password) ||
    empty($confirmar)
) {
    echo "<script>
            alert('Todos los campos obligatorios deben llenarse.');
            window.location='registro.php';
          </script>";
    exit();
}

// Validar nombre
if (!preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúÑñ ]+$/u", $nombre)) {
    echo "<script>
            alert('El nombre solo puede contener letras.');
            window.location='registro.php';
          </script>";
    exit();
}

// Validar apellido paterno
if (!preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúÑñ ]+$/u", $apellido_paterno)) {
    echo "<script>
            alert('El apellido paterno solo puede contener letras.');
            window.location='registro.php';
          </script>";
    exit();
}

// Validar apellido materno
if (!empty($apellido_materno)) {
    if (!preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúÑñ ]+$/u", $apellido_materno)) {
        echo "<script>
                alert('El apellido materno solo puede contener letras.');
                window.location='registro.php';
              </script>";
        exit();
    }
}

// Validar correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
            alert('Correo electrónico inválido.');
            window.location='registro.php';
          </script>";
    exit();
}

// Validar usuario
if (!preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
    echo "<script>
            alert('El usuario solo puede contener letras, números y guion bajo.');
            window.location='registro.php';
          </script>";
    exit();
}

// Validar contraseña
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/", $password)) {
    echo "<script>
            alert('La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula y un número.');
            window.location='registro.php';
          </script>";
    exit();
}

// Confirmar contraseña
if ($password != $confirmar) {
    echo "<script>
            alert('Las contraseñas no coinciden.');
            window.location='registro.php';
          </script>";
    exit();
}

// Verificar correo existente
$sqlCorreo = $conexion->prepare("SELECT id FROM usuarios WHERE correo=?");
$sqlCorreo->bind_param("s", $correo);
$sqlCorreo->execute();
$sqlCorreo->store_result();

if ($sqlCorreo->num_rows > 0) {

    echo "<script>
            alert('Ese correo ya está registrado.');
            window.location='registro.php';
          </script>";
    exit();
}

// Verificar usuario existente
$sqlUsuario = $conexion->prepare("SELECT id FROM usuarios WHERE usuario=?");
$sqlUsuario->bind_param("s", $usuario);
$sqlUsuario->execute();
$sqlUsuario->store_result();

if ($sqlUsuario->num_rows > 0) {

    echo "<script>
            alert('Ese nombre de usuario ya existe.');
            window.location='registro.php';
          </script>";
    exit();
}

// Encriptar contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario
$stmt = $conexion->prepare("INSERT INTO usuarios
(nombre, apellido_paterno, apellido_materno, correo, usuario, password, rol)
VALUES (?, ?, ?, ?, ?, ?, 'admin')");

$stmt->bind_param(
    "ssssss",
    $nombre,
    $apellido_paterno,
    $apellido_materno,
    $correo,
    $usuario,
    $passwordHash
);

if ($stmt->execute()) {

    echo "<script>
            alert('Cuenta creada correctamente. Ahora inicia sesión.');
            window.location='login.php';
          </script>";

} else {

    echo "<script>
            alert('Ocurrió un error al registrar.');
            window.location='registro.php';
          </script>";

}

$stmt->close();
$conexion->close();

?>