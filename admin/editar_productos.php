<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: ../login.php");
    exit();
}

require_once("../conexion.php");

$id = (int)$_GET["id"];

$sql = $conexion->prepare("SELECT * FROM productos WHERE id=?");
$sql->bind_param("i",$id);
$sql->execute();

$producto = $sql->get_result()->fetch_assoc();

if(!$producto){
    die("Producto no encontrado.");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $color = $_POST["color"];
    $descripcion = $_POST["descripcion"];

    $tallas="";

    if(isset($_POST["tallas"])){
        $tallas = implode(",",$_POST["tallas"]);
    }

    $update = $conexion->prepare("UPDATE productos
    SET nombre=?,marca=?,categoria=?,precio=?,stock=?,color=?,tallas=?,descripcion=?
    WHERE id=?");

    $update->bind_param(
        "sssdisssi",
        $nombre,
        $marca,
        $categoria,
        $precio,
        $stock,
        $color,
        $tallas,
        $descripcion,
        $id
    );

    $update->execute();

    header("Location: productos.php");
    exit();
}

$tallasGuardadas = explode(",", $producto["tallas"]);
?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Producto</title>

<link rel="stylesheet" href="admin.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="formulario">

<h2>

<i class="fa-solid fa-pen-to-square"></i>

Editar Producto

</h2>

<form method="POST">

<!-- IMAGEN -->

<div class="preview">

<img
src="../uploads/<?php echo $producto["imagen"]; ?>"
style="display:block;opacity:1;">

</div>

<label>

Nombre del producto

</label>

<input
type="text"
name="nombre"
value="<?php echo $producto["nombre"]; ?>"
required>

<label>

Marca

</label>

<input
list="marcas"
name="marca"
value="<?php echo $producto["marca"]; ?>"
required>

<datalist id="marcas">

<option value="Nike">

<option value="Adidas">

<option value="Puma">

<option value="Under Armour">

<option value="Reebok">

<option value="Genérica">

</datalist>

<label>

Categoría

</label>

<input
list="categorias"
name="categoria"
value="<?php echo $producto["categoria"]; ?>"
required>

<datalist id="categorias">

<option value="Playera">

<option value="Pantalón">

<option value="Short">

<option value="Sudadera">

<option value="Tenis">

<option value="Accesorio">

<option value="Calcetas">

<option value="Gorra">

<option value="Mochila">

</datalist>


<label>

Precio

</label>

<input
type="number"
step="0.01"
name="precio"
value="<?php echo $producto["precio"]; ?>"
required>

<label>

Stock disponible

</label>

<input
type="number"
name="stock"
value="<?php echo $producto["stock"]; ?>"
required>

<label>

Color

</label>

<input
type="text"
name="color"
value="<?php echo $producto["color"]; ?>"
required>

<label>

Tallas disponibles

</label>

<div class="tallas">

<label>

<input
type="checkbox"
name="tallas[]"
value="CH"

<?php if(in_array("CH",$tallasGuardadas)) echo "checked"; ?>

>

CH

</label>

<label>

<input
type="checkbox"
name="tallas[]"
value="M"

<?php if(in_array("M",$tallasGuardadas)) echo "checked"; ?>

>

M

</label>

<label>

<input
type="checkbox"
name="tallas[]"
value="G"

<?php if(in_array("G",$tallasGuardadas)) echo "checked"; ?>

>

G

</label>

<label>

<input
type="checkbox"
name="tallas[]"
value="XG"

<?php if(in_array("XG",$tallasGuardadas)) echo "checked"; ?>

>

XG

</label>

</div>

<label>

Descripción

</label>

<textarea
name="descripcion"
rows="5"
required><?php echo $producto["descripcion"]; ?></textarea>

<div style="display:flex;gap:15px;margin-top:30px;">

<button
type="submit"
style="flex:1;">

<i class="fa-solid fa-floppy-disk"></i>

Guardar Cambios

</button>

<a
href="productos.php"

style="

flex:1;

display:flex;

justify-content:center;

align-items:center;

text-decoration:none;

background:#444;

color:white;

border-radius:15px;

font-weight:bold;

transition:.3s;

">

Cancelar

</a>

</div>

</form>

</div>

</body>

</html>