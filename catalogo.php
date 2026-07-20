<section class="catalogo" id="catalogo">

<div class="catalogo-header">

    <h2>
        <i class="fa-solid fa-fire"></i>
        Catálogo Deportivo
    </h2>

    <p>
        Descubre nuestra colección de ropa deportiva para entrenar con estilo.
    </p>

</div>

<div class="productos-grid">

<?php while($producto = $productos->fetch_assoc()){ ?>

<div class="producto-card">

<div class="imagenProducto">

<img
src="uploads/<?php echo $producto['imagen']; ?>"
alt="<?php echo $producto['nombre']; ?>"
loading="lazy">

<?php

if($producto["stock"]>10){

echo "<span class='badge disponible'>Disponible</span>";

}elseif($producto["stock"]>0){

echo "<span class='badge ultimas'>Últimas piezas</span>";

}else{

echo "<span class='badge agotado'>Agotado</span>";

}

?>

</div>

<div class="producto-info">


<h3 class="nombreProducto">

<?php echo $producto["nombre"]; ?>

</h3>

<p class="marcaProducto">

<i class="fa-solid fa-tag"></i>

<?php echo $producto["marca"]; ?>

</p>

<h2 class="precioProducto">

$<?php echo number_format($producto["precio"],2); ?>

</h2>

<div class="detallesProducto">

<span>

<i class="fa-solid fa-layer-group"></i>

<?php echo $producto["categoria"]; ?>

</span>

<span>

<i class="fa-solid fa-palette"></i>

<?php echo $producto["color"]; ?>

</span>

</div>

<div class="tallasProducto">

<?php

$tallas = explode(",", $producto["tallas"]);

foreach($tallas as $talla){

echo "<span>".$talla."</span>";

}

?>

</div>

<p class="descripcion-producto">

<?php

echo substr($producto["descripcion"],0,80);

if(strlen($producto["descripcion"])>80){

echo "...";

}

?>

</p>