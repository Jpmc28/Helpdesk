<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="IMG/Honor1.webp" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/newticket.css">
    <title>newticket</title>
</head>
<body>
    <a href="../index.php" id="a"><img src="IMG/return.png" alt="return"></a>
    <?php if (!isset($_GET['ticket_id'])): ?>
      <form action="../BACK/newticketconn.php" method="POST" enctype="multipart/form-data">
        <div id="ticketnew">
          <h1>Please continue the steps</h1>
          <hr>
          <div id="datos">
            <input type="text" name="full_name" placeholder="Your full name" id="name" maxlength="40" required>
            <label class="custom-btn" id="uploadbtn" for="fileInput"><div id="pictures">Upload Pictures</div></label>
            <input type="file" id="fileInput" name="picture" accept="image/*">
            <input type="text" name="honor_id" placeholder="Your Honor Id" id="id" maxlength="9" required>
          </div>
          <div>
            <textarea name="problem_text" id="text" rows="10" cols="50" placeholder="Escribe aquí tu requerimiento..." required></textarea>
          </div>
          <input type="submit" value="Send" id="Send">
        </div>
      </form>
    <?php endif; ?>
        <?php if (isset($_GET['ticket_id'])): ?>
        <?php $ticket_id = htmlspecialchars($_GET['ticket_id']); ?>
        <div style="
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
            width: 80%;
            margin: 30px auto;
            border-radius: 15px;
            text-align: center;
            font-family: Open Sans, sans-serif;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        ">
            <p style='font-size: 18px;'>Our IT Team will respond to your ticket as soon as possible</p>
            <p style='font-size: 20px; font-weight: bold;'>Your N° Ticket: <?php echo $ticket_id; ?></p>
            <button onclick="window.location.href='../Tickets/newticket.php'" style='
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
    <?php endif; ?>
    <footer id="marca_de_propiedad">
        <p>Designed by Juan Martin (Field Master) @Colombia</p>
    </footer>
    <script>
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('uploadBtn');

    fileInput.addEventListener('change', function() {
      if (fileInput.files.length > 0) {
        uploadBtn.textContent = 'Picture Uploaded✅';
      } else {
        uploadBtn.textContent = 'Upload Pictures';
      }
    });
  </script>
</body>
</html>