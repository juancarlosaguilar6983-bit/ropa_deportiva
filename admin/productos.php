<?php

include("includes/header_admin.php");
require_once("../conexion.php");


$productos = $conexion->query(
    "SELECT * FROM productos ORDER BY id DESC"
);

?>


<h1 class="tituloModulo">

<i class="fa-solid fa-shirt"></i>

Gestión de Productos

</h1>



<div class="contenedorProductos">



<div class="formulario">


<h2>
Agregar Producto
</h2>



<form

action="guardar_producto.php"

method="POST"

enctype="multipart/form-data">



<!-- ======================
        IMAGEN
======================= -->


<div 
class="preview"
onclick="document.getElementById('imagen').click()">



<img 
id="vistaPrevia"
src="../img/no-image.png">



<div class="agregarImagen">


<div class="circuloMas">

<i class="fa-solid fa-camera"></i>

</div>


<div class="textoImagen">

Subir foto

</div>


</div>



</div>




<input

type="file"

name="imagen"

id="imagen"

accept="image/*"

hidden

required>





<!-- ======================
        NOMBRE
======================= -->


<label>

Nombre del producto

</label>



<input

type="text"

name="nombre"

placeholder="Ejemplo: Playera deportiva"

required>



<!-- ======================
        MARCA
======================= -->


<label>

Marca

</label>



<input

type="text"

name="marca"

list="marcas"

placeholder="Escribe o selecciona una marca"

required>



<datalist id="marcas">


<option value="Nike">

<option value="Adidas">

<option value="Puma">

<option value="Under Armour">

<option value="Reebok">

<option value="Genérica">


</datalist>



<!-- ======================
        CATEGORIA
======================= -->


<label>

Categoría

</label>



<input

type="text"

name="categoria"

list="categorias"

placeholder="Ejemplo: Playera, Tenis..."

required>



<datalist id="categorias">


<option value="Playera">

<option value="Pantalón">

<option value="Short">

<option value="Sudadera">

<option value="Tenis">

<option value="Accesorio">

<option value="Mochila">

<option value="Gorra">


</datalist>



<!-- ======================
        PRECIO
======================= -->


<label>

Precio

</label>



<input

type="number"

step="0.01"

name="precio"

placeholder="499.99"

required>





<!-- ======================
        STOCK
======================= -->


<label>

Stock disponible

</label>



<input

type="number"

name="stock"

placeholder="Cantidad"

required>


<!-- COLOR -->


<label>

Color

</label>


<input

type="text"

name="color"

placeholder="Negro, blanco, azul..."

required>





<!-- TALLAS -->


<label>

Tallas disponibles

</label>



<div class="tallas">


<label>

<input

type="checkbox"

name="tallas[]"

value="CH">

CH

</label>



<label>

<input

type="checkbox"

name="tallas[]"

value="M">

M

</label>



<label>

<input

type="checkbox"

name="tallas[]"

value="G">

G

</label>



<label>

<input

type="checkbox"

name="tallas[]"

value="XG">

XG

</label>


</div>






<!-- DESCRIPCIÓN -->


<label>

Descripción

</label>



<textarea

name="descripcion"

rows="5"

placeholder="Descripción del producto"

required></textarea>






<button type="submit">


<i class="fa-solid fa-floppy-disk"></i>


Guardar Producto


</button>



</form>


</div>






<!-- ==========================
      PRODUCTOS REGISTRADOS
========================== -->


<div class="listaProductos">


<h2>

Productos Registrados

</h2>




<div class="gridProductos">





<?php while($p=$productos->fetch_assoc()){ ?>



<div class="producto">



<img

src="../uploads/<?php echo $p['imagen']; ?>">





<h3>

<?php echo $p["nombre"]; ?>

</h3>





<h4>

$

<?php echo number_format($p["precio"],2); ?>

</h4>





<p>

<strong>Marca:</strong>

<?php echo $p["marca"]; ?>

</p>





<p>

<strong>Categoría:</strong>

<?php echo $p["categoria"]; ?>

</p>





<p>

<strong>Color:</strong>

<?php echo $p["color"]; ?>

</p>





<p>

<strong>Tallas:</strong>

<?php echo $p["tallas"]; ?>

</p>





<p>

<strong>Stock:</strong>


<?php


if($p["stock"]>10){


echo "<span class='disponible'>Disponible</span>";


}elseif($p["stock"]>0){


echo "<span class='ultimas'>Últimas piezas</span>";


}else{


echo "<span class='agotado'>Agotado</span>";


}


?>


</p>





<div class="acciones">


<a href="editar_productos.php?id=<?php echo $p["id"]; ?>">

Editar

</a>




<a href="eliminar_productos.php?id=<?php echo $p["id"]; ?>">

Eliminar

</a>



</div>





</div>



<?php } ?>





</div>


</div>


</div>







<script>


const imagen = document.getElementById("imagen");

const vista = document.getElementById("vistaPrevia");

const botonImagen = document.getElementById("botonImagen");



imagen.addEventListener("change", function(){



const archivo = this.files[0];



if(archivo){



vista.src = URL.createObjectURL(archivo);



vista.style.opacity = "1";



botonImagen.style.display = "none";



}



});



</script>






<?php

include("includes/footer_admin.php");

?>