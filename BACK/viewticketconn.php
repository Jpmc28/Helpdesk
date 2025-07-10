<?php
session_start();
include "conexionbd.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["SerialTicket"])) {
    $SerialTicket = $_POST["SerialTicket"];

    $sql = "SELECT T.* , U.NameUser FROM Tickets T LEFT JOIN user U ON t.HonorIdIt = U.HonorId WHERE IdTicket = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $SerialTicket);

    if ($stmt->execute()) {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $_SESSION['ticketInfo'] = $resultado->fetch_assoc();
        } else {
            $_SESSION['ticketError'] = "No se encontró ningún ticket con ese ID.";
        }
    } else {
        $_SESSION['ticketError'] = "Error al ejecutar la consulta.";
    }

    $stmt->close();
    $conexion->close();

    // Redirigir de vuelta al frontend
    header("Location: ../ViewTickets/viewticket.php");
    exit;
}
?>
