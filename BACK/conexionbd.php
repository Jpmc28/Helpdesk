<?php

#conexion a la bd

$host = "10.48.137.136";
$user = "ItHonor";
$password = "S0P0RT3!";
$database = "helpdesk";

$conexion = new mysqli($host, $user, $password, $database);

#verificacion de conexion a la bd
/*
if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
} else {
    echo "Conexion exitosa a la base de datos";
}*/
?>