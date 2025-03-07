<?php
// Inclure l'autoloader de Composer pour charger PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.smarttec.sn'; // Serveur iRedMail
    $mail->SMTPAuth = true;
    $mail->Username = 'postmaster@mail.smarttec.sn'; // Ton adresse e-mail
    $mail->Password = 'passer'; // Ton mot de passe
    $mail->SMTPSecure = 'tls'; // Sécurisation
    $mail->Port = 587; // Port SMTP

    // Expéditeur et destinataire
    $mail->setFrom('nabou@mail.smarttec.sn', 'SmartTech Notifications');
    $mail->addAddress('satou@mail.smarttec.sn'); // Destinataire

    // Sujet et contenu de l'e-mail
    $mail->Subject = 'Test de Notification';
    $mail->Body    = 'Ceci est un test de notification depuis iRedMail.';
    $mail->AltBody = 'Ceci est un test en texte brut.';

    // Envoi de l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès !';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
}
?>

