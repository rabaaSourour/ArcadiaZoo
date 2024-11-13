<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Model\Contact;

class Mailer {
    public function sendEmail(Contact $contact) {
        $mail = new PHPMailer(true);

        try {
            // Configurations du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'Zoo.arcadia1960@gmail.com';
            $mail->Password = 'nybo ddwa nwoi pqad';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Expéditeur et destinataire
            $mail->setFrom($contact->email, 'Visiteur du Zoo');
            $mail->addAddress('Zoo.arcadia1960@gmail.com', 'Arcadia');

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $contact->title;
            $mail->Body = "<p>{$contact->description}</p><p>Répondre à : {$contact->email}</p>";

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
            error_log("Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo);
            return false;
        }        
    }
}
