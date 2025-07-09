<?php
include "conexionbd.php";

// Recibir datos del formulario
$full_name    = $_POST['full_name'];
$honor_id     = $_POST['honor_id'];
$problem_text = $_POST['problem_text'];
//imagen subir
$picture_blob = null;
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === 0) {
    $picture_blob = file_get_contents($_FILES['picture']['tmp_name']);
}

// Insertar en la base de datos
$sql = "INSERT INTO tickets (FullName, HonorId, ProblemText, Pictures, StartDate)
        VALUES (?, ?, ?, ?, NOW())";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $full_name, $honor_id, $problem_text, $picture_blob);

if ($stmt->execute()) {
    // Obtener el ID autoincremental generado
    $ticket_id = $conexion->insert_id;

    echo "
    <div style='
        background-color: #1e3a8a;
        color: white;
        padding: 20px;
        width: 80%;
        margin: 30px auto;
        border-radius: 15px;
        text-align: center;
        font-family: Open Sans, sans-serif;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    '>
        <p style='font-size: 18px;'>Our IT Team will respond to your ticket as soon as possible</p>
        <p style='font-size: 20px; font-weight: bold;'>Your N° Ticket: $ticket_id</p>
        <button onclick='window.location.href=\"../Tickets/newticket.php\"' style='
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            background-color: white;
            color: #1e3a8a;
            cursor: pointer;
        '>Ok</button>
    </div>
    ";
} else {
    echo "❌ Error al insertar ticket: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>