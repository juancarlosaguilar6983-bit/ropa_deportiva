<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "sport_store";

$conexion = new mysqli($host, $usuario, $password, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");

?>