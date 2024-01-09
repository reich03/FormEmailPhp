<?php
require("mail.php");
function validate($name, $email, $subject, $message, $form)
{
  return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if (isset($_POST["form"])) {
  //Array unpacking para enviar el array del post
  if (validate(...$_POST)) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $body = "$name <$email> te envia el siguiente mensaje: <br><br> 
    $message";
    
    //Logica mandar el correo
    SendEmail($subject, $body, $email, $name);
    $status = "succes";
  } else {
    $status = "danger";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proyecto Form Contacto</title>
  <link rel="stylesheet" href="./styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <form action="./" method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="bodyform">
        <h1>Contactenos!!</h1>
        <div class="form-group">
          <label for="name">Nombre Persona:</label>
          <input type="text" class="form-control" name="name" id="name" />
        </div>
        <div class="form-group">
          <label for="email">Correo:</label>
          <input type="email" class="form-control" name="email" id="email" />
        </div>
        <div class="form-group">
          <label for="subject">Asunto:</label>
          <input type="text" class="form-control" name="subject" id="subject" />
        </div>
        <div class="form-group">
          <label for="message">Mensaje:</label>
          <textarea name="message" id="message" class="form-control">
            </textarea>
        </div>
        <div class="containerButton">
          <button class="btn btn-primary" name="form">Enviar</button>
        </div>

        <div class="contact-info">
          <div class="info">
            <span>Developer @JhojanGrisales</span>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    function showAlert(type, message) {
      Swal.fire({
        icon: type,
        title: message,
        showConfirmButton: true,
      });
    }
    window.onload = function() {
      <?php if ($status === "succes") : ?>
        showAlert('success', '¡Envío exitoso!');
      <?php elseif ($status === "danger") : ?>
        showAlert('error', 'Error en el envío. Por favor, revisa los campos.');
      <?php endif; ?>
    };
  </script>
</body>

</html>