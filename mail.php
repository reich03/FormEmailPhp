<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("vendor/autoload.php");

function SendEmail($subject, $body, $email, $name, $html = false)
{

    //Configuraciones del Servidor con mailtrap.io
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'redjhojan0319@gmail.com';
    $phpmailer->Password = 'ieogoqiyjlxvklrn';

    //Destinatarios
    $phpmailer->setFrom('redjhojan0319@gmail.com', 'JhojanGrisales');
    $phpmailer->addAddress($email, $name);

    // Contenido de mi mensaje
    $phpmailer->isHTML($html);
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;
    $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $phpmailer->send();
}
