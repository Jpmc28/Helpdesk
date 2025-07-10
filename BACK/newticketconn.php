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
    $ticket_id = $conexion->insert_id;
    header("Location: ../Tickets/newticket.php?ticket_id=$ticket_id");
    exit();
}

$stmt->close();
$conexion->close();
?>