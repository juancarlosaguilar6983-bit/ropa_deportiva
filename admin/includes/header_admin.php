<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["rol"] != "admin") {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sport Store | Administrador</title>

<link rel="stylesheet" href="admin.css">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<div class="logo">

<i class="fa-solid fa-dumbbell"></i>

<h2>SPORT STORE</h2>

</div>

<ul>

<li>
<a href="panel.php">
<i class="fa-solid fa-chart-line"></i>
Dashboard
</a>
</li>

<li>
<a href="productos.php">
<i class="fa-solid fa-shirt"></i>
Productos
</a>
</li>

<li>
<a href="pedidos.php">
<i class="fa-solid fa-cart-shopping"></i>
Pedidos
</a>
</li>

<li>
<a href="clientes.php">
<i class="fa-solid fa-users"></i>
Clientes
</a>
</li>

<li>
<a href="ventas.php">
<i class="fa-solid fa-chart-column"></i>
Ventas
</a>
</li>

<li>
<a href="configuracion.php">
<i class="fa-solid fa-gear"></i>
Configuración
</a>
</li>

<li>
<a href="../logout.php">
<i class="fa-solid fa-right-from-bracket"></i>
Cerrar sesión
</a>
</li>

</ul>

</div>

<div class="contenido">