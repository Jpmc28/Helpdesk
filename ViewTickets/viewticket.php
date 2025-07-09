<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/view.css">
    <link rel="icon" href="IMG/Honor1.webp" type="image/x-icon">
    <title>viewticket</title>
</head>
<body>
    <form action="../BACK/viewticketconn.php" method="post">
        <div id="busqueda">
            <input type="text" maxlength="5" name="SerialTicket" placeholder="Ticket ID" required>
            <input type="submit" value="Check" id="Check" />
        </div>
    </form>
    <footer id="marca_de_propiedad">
        <p>Designed by Juan Martin (Field Master) @Colombia</p>
    </footer>
</body>
</html>