<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Sport Store</title>


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



<h2>Iniciar sesión</h2>


<p>
Ingresa para acceder a tu cuenta
</p>



<form action="validar_login.php" method="POST">


<div class="input-box">

<i class="fa-solid fa-user"></i>

<input 
type="text"
name="usuario"
placeholder="Usuario"
required>

</div>



<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input 
type="password"
name="password"
placeholder="Contraseña"
required>

</div>



<button type="submit">

Entrar

</button>


</form>



<a href="index.php" class="volver">

<i class="fa-solid fa-arrow-left"></i>

Volver al inicio

</a>



</div>


</div>



</body>

</html>