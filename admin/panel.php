<?php
include("includes/header_admin.php");
?>

<header>

<h1>

Bienvenido,

<?php echo $_SESSION["nombre"]; ?>

👋

</h1>

</header>

<div class="cards">

<div class="card">

<i class="fa-solid fa-shirt"></i>

<h2>0</h2>

<p>Productos</p>

</div>

<div class="card">

<i class="fa-solid fa-users"></i>

<h2>0</h2>

<p>Clientes</p>

</div>

<div class="card">

<i class="fa-solid fa-cart-shopping"></i>

<h2>0</h2>

<p>Pedidos</p>

</div>

<div class="card">

<i class="fa-solid fa-dollar-sign"></i>

<h2>$0</h2>

<p>Ventas</p>

</div>

</div>

<div class="bienvenida">

<h2>

🚀 Panel de Administración

</h2>

<p>

Bienvenido al centro de administración de Sport Store.

Desde aquí podrás controlar toda tu tienda.

</p>

</div>

<?php
include("includes/footer_admin.php");
?>