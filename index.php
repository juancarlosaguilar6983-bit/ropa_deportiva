<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Store | Ropa Deportiva</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<header class="header">

    <div class="logo">

        <i class="fa-solid fa-dumbbell"></i>

        <span>SPORT STORE</span>

    </div>

    <nav>

        <a href="index.php">Inicio</a>

        <a href="#catalogo">Catálogo</a>

        <a href="#nosotros">Nosotros</a>

        <a href="#contacto">Contacto</a>

    </nav>

<?php if(isset($_SESSION["usuario"])): ?>

    <div class="usuario">

        <span>

            <i class="fa-solid fa-circle-user"></i>

            Hola,
            <strong><?php echo htmlspecialchars($_SESSION["nombre"]); ?></strong>

        </span>

<?php if($_SESSION["rol"]=="admin"): ?>

        <a href="admin/panel.php">

            <i class="fa-solid fa-gears"></i>

            Panel

        </a>

<?php else: ?>

        <a href="#catalogo">

            <i class="fa-solid fa-cart-shopping"></i>

            Catálogo

        </a>

<?php endif; ?>

        <a href="logout.php">

            <i class="fa-solid fa-right-from-bracket"></i>

            Salir

        </a>

    </div>

<?php else: ?>

    <div class="acciones">

        <a href="login.php" class="btnLogin">

            <i class="fa-solid fa-right-to-bracket"></i>

            Iniciar sesión

        </a>

        <a href="registro.php" class="btnRegistro">

            Crear cuenta

        </a>

    </div>

<?php endif; ?>

</header>

<section class="hero">

    <div class="overlay"></div>

    <div class="contenidoHero">

        <span class="subtitulo">

            SPORT STORE 2026

        </span>

        <h1>

            Equípate para superar
            tus propios límites.

        </h1>

        <p>

            Playeras, shorts, tenis y accesorios deportivos
            con la mejor calidad para entrenar, competir
            o vestir con estilo.

        </p>

        <div class="botonesHero">

            <a href="#catalogo" class="btnPrincipal">

                <i class="fa-solid fa-shirt"></i>

                Ver catálogo

            </a>

            <a href="#nosotros" class="btnSecundario">

                <i class="fa-solid fa-circle-info"></i>

                Conócenos

            </a>

        </div>

    </div>

</section>

<!--=========================================
            CARRUSEL SPORT STORE
==========================================-->

<section class="slider">

    <div class="slide activo">

        <img src="img/carrusel/slide1.jpg" alt="Nueva colección">

        <div class="textoSlide">

            <span>NUEVA COLECCIÓN</span>

            <h2>Ropa deportiva para todos.</h2>

            <p>
                Descubre prendas cómodas, modernas y listas para acompañarte
                en cada entrenamiento.
            </p>

            <a href="#catalogo">
                Ver catálogo
            </a>

        </div>

    </div>

    <div class="slide">

        <img src="img/carrusel/slide2.jpg" alt="Playeras">

        <div class="textoSlide">

            <span>PLAYERAS</span>

            <h2>Comodidad en cada movimiento.</h2>

            <p>
                Diseños modernos ideales para entrenar o vestir de forma casual.
            </p>

            <a href="#catalogo">
                Explorar
            </a>

        </div>

    </div>

    <div class="slide">

        <img src="img/carrusel/slide3.jpg" alt="Sudaderas">

        <div class="textoSlide">

            <span>SUDADERAS</span>

            <h2>Perfectas para cualquier clima.</h2>

            <p>
                Encuentra sudaderas deportivas con excelente calidad y estilo.
            </p>

            <a href="#catalogo">
                Ver más
            </a>

        </div>

    </div>

    <div class="slide">

        <img src="img/carrusel/slide4.jpg" alt="Shorts">

        <div class="textoSlide">

            <span>SHORTS Y PANTS</span>

            <h2>Muévete con libertad.</h2>

            <p>
                Diseñados para ofrecer comodidad durante cualquier actividad.
            </p>

            <a href="#catalogo">
                Comprar
            </a>

        </div>

    </div>

    <div class="slide">

        <img src="img/carrusel/slide5.jpg" alt="Sport Store">

        <div class="textoSlide">

            <span>SPORT STORE</span>

            <h2>Viste como un campeón.</h2>

            <p>
                Calidad, comodidad y atención personalizada en un solo lugar.
            </p>

            <a href="#nosotros">
                Conócenos
            </a>

        </div>

    </div>

    <!-- Flechas -->

    <button class="prev">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button class="next">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <!-- Indicadores -->

    <div class="indicadores">

        <span class="activo"></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>

    </div>

</section>

<section class="informacion">

    <div class="caja">

        <i class="fa-solid fa-truck-fast"></i>

        <h3>Aparta desde casa</h3>

        <p>Reserva tus prendas sin salir de tu hogar.</p>

    </div>

    <div class="caja">

        <i class="fa-solid fa-shirt"></i>

        <h3>Calidad garantizada</h3>

        <p>Trabajamos con prendas deportivas de excelente calidad.</p>

    </div>

    <div class="caja">

        <i class="fa-solid fa-calendar-days"></i>

        <h3>Tú eliges cuándo recoger</h3>

        <p>Aparta hoy y recoge el día que mejor te convenga.</p>

    </div>

</section>

<!-- ==========================
        NOSOTROS
========================== -->

<section class="nosotros" id="nosotros">

    <div class="nosotrosImagen">

        <img src="img/local.jpg" alt="Sport Store">

    </div>

    <div class="nosotrosInfo">

        <span class="tituloPequeño">
            NUESTRA HISTORIA
        </span>

        <h2>
            Más que una tienda deportiva.
        </h2>

        <p>

            En <strong>Sport Store</strong> creemos que el deporte transforma vidas.
            Nuestro objetivo es ofrecer ropa deportiva moderna, cómoda y de excelente
            calidad para que puedas entrenar con confianza y estilo.

        </p>

        <div class="listaNosotros">

            <div>

                <i class="fa-solid fa-circle-check"></i>

                Productos de calidad

            </div>

            <div>

                <i class="fa-solid fa-circle-check"></i>

                Atención personalizada

            </div>

            <div>

                <i class="fa-solid fa-circle-check"></i>

                Aparta desde casa

            </div>

            <div>

                <i class="fa-solid fa-circle-check"></i>

                Gran variedad de tallas

            </div>

        </div>

        <a href="#catalogo" class="btnNosotros">

            Ver catálogo

        </a>

    </div>

</section>
<?php include("catalogo.php"); ?>

<footer>

    <p>

        © 2026 Sport Store - Todos los derechos reservados.

    </p>

</footer>

<script src="js/script.js"></script>

</body>

</html>