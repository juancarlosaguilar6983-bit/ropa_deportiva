<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Crear cuenta | Sport Store</title>

<link rel="stylesheet" href="css/login.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="login-container">

<div class="login-box">

<div class="logo-login">

<i class="fa-solid fa-dumbbell"></i>

<h1>SPORT STORE</h1>

</div>

<h2>Crear cuenta</h2>

<p>Completa todos los campos.</p>

<form action="guardar_usuario.php" method="POST" id="formRegistro">

<div class="input-box">

<i class="fa-solid fa-user"></i>

<input
type="text"
name="nombre"
id="nombre"
placeholder="Nombre(s)"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-user"></i>

<input
type="text"
name="apellido_paterno"
id="apellido_paterno"
placeholder="Apellido paterno"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-user"></i>

<input
type="text"
name="apellido_materno"
id="apellido_materno"
placeholder="Apellido materno">

</div>

<div class="input-box">

<i class="fa-solid fa-envelope"></i>

<input
type="email"
name="correo"
id="correo"
placeholder="Correo electrónico"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-circle-user"></i>

<input
type="text"
name="usuario"
id="usuario"
placeholder="Usuario"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input
type="password"
name="password"
id="password"
placeholder="Contraseña"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input
type="password"
name="confirmar"
id="confirmar"
placeholder="Confirmar contraseña"
required>

</div>

<button type="submit">

Crear cuenta

</button>

</form>

<a href="login.php" class="volver">

Ya tengo cuenta

</a>

</div>

</div>

<script src="js/registro.js"></script>

</body>

</html>