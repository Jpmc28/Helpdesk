<?php

#conexion a la bd

$host = "localhost";
$user = "root";
$password = "S0p0rt3!";
$database = "helpdesk";

$conn = new mysqli($host, $user, $password, $database);

#verificacion de conexion a la bd
/*
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
} else {
    echo "Conexion exitosa a la base de datos";
}*/

$conn->close();
?>