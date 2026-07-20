<?php

session_start();

if(!isset($_SESSION["usuario"])){

header("Location: ../login.php");

exit();

}

require_once("../conexion.php");

$id=(int)$_GET["id"];

$sql=$conexion->prepare("DELETE FROM productos WHERE id=?");

$sql->bind_param("i",$id);

$sql->execute();

header("Location: productos.php");

exit();

?>