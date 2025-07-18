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
            <input type="text" name="full_name" placeholder="Your full name" id="name" maxlength="40" onkeyup="validarLetras(this)" required>
            <label class="custom-btn" id="uploadbtn" for="fileInput"><div id="pictures">Upload Pictures</div></label>
            <input type="file" id="fileInput" name="picture" accept="image/*">
            <span id="fileError" style="color: red;"></span>
            <input type="text" name="honor_id" placeholder="Your Honor Id" id="id" maxlength="9" oninput="validarAlfanumerico(this)" required>
          </div>
          <div>
            <textarea name="problem_text" id="text" rows="10" cols="50" placeholder="Escribe aquí tu requerimiento..." required maxlength="600"></textarea>
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
        <p>Designed by Juan Martin (It Assistent) @Colombia</p>
    </footer>
    <script>
      //validar peso de las imagenes para verificar aceptar en la bd
    const fileInput = document.getElementById('fileInput');
    const uploadBtn = document.getElementById('pictures');
    const fileError = document.getElementById('fileError');

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        const maxSize = 3 * 1024 * 1024; // 3MB
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

        if (file) {
            if (!allowedTypes.includes(file.type)) {
                fileError.textContent = alert("Formato no permitido. Solo JPG, PNG, GIF o WEBP.");
                this.value = ""; // Borra el archivo
                uploadBtn.textContent = 'Upload Pictures';
            } else if (file.size > maxSize) {
                fileError.textContent = alert("El archivo supera el tamaño máximo de 1MB.");
                this.value = "";
                uploadBtn.textContent = 'Upload Pictures';
            } else {
                fileError.textContent = "";
                uploadBtn.textContent = 'Picture Uploaded✅';
            }
        } else {
            fileError.textContent = "";
            uploadBtn.textContent = 'Upload Pictures';
        }
    });

    function validarLetras(input) {
      const regex = /^[a-zA-Z\s]+$/;
      const valor = input.value;

      if (!regex.test(valor)) {
        input.value = valor.replace(/[^a-zA-Z\s]/g, '');
      }
    };
    function validarAlfanumerico(input) {
      input.value = input.value.replace(/[^a-zA-Z0-9]/g, ''); // quitar no alfanuméricos

      // Forzar que el primer carácter sea letra, y lo demás números
      let match = input.value.match(/^([a-zA-Z]?)(\d*)/);
      input.value = (match[1] || '') + (match[2] || '');
    };
    
  </script>
</body>
</html>