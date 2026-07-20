<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();


/* ==========================
   VALIDAR ADMIN
========================== */


if(!isset($_SESSION["usuario"])){

    header("Location: ../login.php");
    exit();

}



require_once("../conexion.php");



/* ==========================
   VALIDAR IMAGEN
========================== */


if(!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] != 0){

    die("No se recibió ninguna imagen.");

}



$imagen = $_FILES["imagen"];



$nombreImagen = time() . "_" . basename($imagen["name"]);




$ruta = "../uploads/" . $nombreImagen;



if(!move_uploaded_file($imagen["tmp_name"], $ruta)){


    die("Error al subir la imagen.");


}




/* ==========================
   RECIBIR DATOS
========================== */


$nombre = trim($_POST["nombre"]);


$marca = trim($_POST["marca"]);


$categoria = trim($_POST["categoria"]);


$precio = $_POST["precio"];


$stock = $_POST["stock"];


$color = trim($_POST["color"]);




/* TALLAS */


$tallas = "";


if(isset($_POST["tallas"])){

    $tallas = implode(",", $_POST["tallas"]);

}




$descripcion = trim($_POST["descripcion"]);






/* ==========================
   GUARDAR EN BD
========================== */



$sql = $conexion->prepare(

"INSERT INTO productos

(nombre,marca,categoria,precio,stock,color,tallas,descripcion,imagen)

VALUES(?,?,?,?,?,?,?,?,?)"

);





$sql->bind_param(

"sssdissss",

$nombre,

$marca,

$categoria,

$precio,

$stock,

$color,

$tallas,

$descripcion,

$nombreImagen

);







if($sql->execute()){



    header("Location: productos.php");

    exit();



}else{



    echo "Error al guardar producto: ".$conexion->error;



}





$sql->close();

$conexion->close();


?>