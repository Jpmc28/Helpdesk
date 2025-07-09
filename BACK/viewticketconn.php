<?php
include "conexionbd.php";

//recibir el dato del formulario

$SerialTicket = $_POST["SerialTicket"];

$sql = "SELECT * FROM Tickets where IdTicket = ? ;";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $SerialTicket);


if ($stmt->execute()) {
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        echo "<h2>Información del Ticket</h2>";
        echo "<p><strong>Nombre:</strong> " . $fila['FullName'] . "</p>";
        echo "<p><strong>Honor ID:</strong> " . $fila['HonorId'] . "</p>";
        echo "<p><strong>Descripción:</strong> " . $fila['ProblemText'] . "</p>";
        echo "<p><strong>Fecha de inicio:</strong> " . $fila['StartDate'] . "</p>";
        // Si deseas mostrar la imagen, descomenta la siguiente línea:
        echo '<img src="data:image/jpeg;base64,'.base64_encode($fila['Pictures']).'"/>';
    } else {
        echo "<p>No se encontró ningún ticket con ese ID.</p>";
    }
} else {
    echo "<p>Error al ejecutar la consulta.</p>";
}

$stmt->close();
$conexion->close();
?>