<?php
session_start();
$ticketInfo = $_SESSION['ticketInfo'] ?? null;
$ticketError = $_SESSION['ticketError'] ?? null;

// Limpiar sesión para futuras consultas
unset($_SESSION['ticketInfo']);
unset($_SESSION['ticketError']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/view.css">
    <link rel="icon" href="IMG/Honor1.webp" type="image/x-icon">
    <title>View Ticket</title>
</head>
<body>
    <a href="../index.php" id="a"><img src="IMG/return.png" alt="return"></a>
    <form action="../BACK/viewticketconn.php" method="post">
        <div id="busqueda">
            <h1>Please put your Nº Ticket on "Ticket ID"</h1>
    
            <div>
            <input type="number" maxlength="5" name="SerialTicket" placeholder="Ticket ID" id="ticketid" required>
            <input type="submit" value="Check" id="Check" />
            </div>
        </div>
    </form>

    <?php if ($ticketInfo): ?>
        <div id="ticketModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>

                <div class="ticket-header">
                    <strong>Atendida por: <?php echo !empty($ticketInfo['NameUser']) ? htmlspecialchars($ticketInfo['NameUser']) : 'No asignado';?></strong> 
                    <br>
                    <span><strong>Honor Id: <?php echo !empty($ticketInfo['HonorIdIt']) ? htmlspecialchars($ticketInfo['HonorIdIt']) : 'No asignado';?></strong> </span>
                </div>
                <hr>
                <div class="ticket-problem">
                    <h3>Your Ticket:</h3>
                    <?php echo nl2br(htmlspecialchars($ticketInfo['ProblemText'])); ?>
                </div>
                <hr>
                <div class="ticket-result">
                    <h3>Answer IT:</h3>
                    <?php echo !empty($ticketInfo['ResulText']) ? htmlspecialchars($ticketInfo['ResulText']) : 'Sin Información'; ?>
                </div>
                <hr>
                <div class="status-container">
                    <div class="ticket-status">
                        <?php echo !empty($ticketInfo['State']) ? htmlspecialchars($ticketInfo['State']) : 'Estado no asignado'; ?>
                    </div>
                    <div class="ticket-actions">
                        <?php if (!empty($ticketInfo['PicturesIt'])): ?>
                            <a href="data:image/jpeg;base64,<?php echo base64_encode($ticketInfo['PicturesIt']); ?>" download="ticket_<?php echo $ticketInfo['IdTicket']; ?>.jpg">
                                <button class="btn-download">Download Pictures</button>
                            </a>
                        <?php else: ?>
                            <button disabled class="btn-disabled">No Picture Uploaded</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function () {
                document.getElementById("ticketModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("ticketModal").style.display = "none";
            }
        </script>
    <?php elseif ($ticketError): ?>
        <p class="error"><?php echo $ticketError; ?></p>
    <?php endif; ?>

    <footer id="marca_de_propiedad">
        <p>Designed by Juan Martin (It Assistent) @Colombia</p>
    </footer>
</body>
</html>
