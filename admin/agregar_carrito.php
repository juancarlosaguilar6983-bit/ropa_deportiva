<?php

session_start();

require_once "conexion.php";


// Verificar usuario

if(!isset($_SESSION["usuario"])){

    header("Location: login.php");
    exit();

}


// Obtener datos

$id_usuario = $_SESSION["usuario"];

$id_producto = $_POST["id_producto"];


// Revisar si ya existe en carrito

$buscar = $conexion->prepare(

"SELECT * FROM carrito 
WHERE id_usuario=? 
AND id_producto=?"

);


$buscar->bind_param(

"ii",

$id_usuario,

$id_producto

);


$buscar->execute();


$resultado = $buscar->get_result();



if($resultado->num_rows > 0){


    // Si existe aumenta cantidad


    $actualizar = $conexion->prepare(

    "UPDATE carrito 
    SET cantidad = cantidad + 1
    WHERE id_usuario=? 
    AND id_producto=?"

    );


    $actualizar->bind_param(

    "ii",

    $id_usuario,

    $id_producto

    );


    $actualizar->execute();



}else{


    // Si no existe lo agrega


    $insertar = $conexion->prepare(

    "INSERT INTO carrito
    (id_usuario,id_producto,cantidad)
    VALUES(?,?,1)"

    );


    $insertar->bind_param(

    "ii",

    $id_usuario,

    $id_producto

    );


    $insertar->execute();


}



// regresar al catálogo

header("Location: index.php#catalogo");

exit();


?>