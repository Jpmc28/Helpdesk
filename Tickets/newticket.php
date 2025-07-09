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
    <form action="../BACK/newticketconn.php" method="POST" enctype="multipart/form-data">
    <div id="ticketnew">
        <h1>Please continue the steps</h1>
        <hr>
        <div id="datos">
        <input type="text" name="full_name" placeholder="Your full name" id="name" maxlength="40" required>
        <label class="custom-btn" id="uploadBtn" for="fileInput"><div id="pictures">Upload Pictures</div></label>
        <input type="file" id="fileInput" name="picture" accept="image/*">
        <input type="text" name="honor_id" placeholder="Your Honor Id" id="id" maxlength="9" required>
        </div>
        <div>
        <textarea name="problem_text" id="text" rows="10" cols="50" placeholder="Escribe aquí tu requerimiento..." maxlength="700" required></textarea>
        </div>
        <input type="submit" value="Send" id="Send">
    </div>
    </form>
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