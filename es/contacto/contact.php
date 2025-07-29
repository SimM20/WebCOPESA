<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["message"]);

    $para = "mail@copesa-ar.com";
    $asunto = "Nuevo mensaje desde el sitio web";
    $contenido = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";

    $cabeceras = "From: no-reply@tudominio.com\r\n"; //Aca va el dominio de hostinger
    $cabeceras .= "Reply-To: $email\r\n";

    if (mail($para, $asunto, $contenido, $cabeceras)) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error al enviar el mensaje";
    }
}
?>