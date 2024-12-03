<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Model\Contact;
use App\Model\User;

class Mailer
{
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        try {
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'Zoo.arcadia1960@gmail.com';
            $this->mail->Password = 'nybo ddwa nwoi pqad';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            $this->mail->isHTML(true);
        } catch (Exception $e) {
            error_log("Erreur de configuration du serveur SMTP : " . $e->getMessage());
        }
    }

    public function sendContactEmail(Contact $contact)
    {
        try {
            $this->mail->setFrom($contact->email, 'Visiteur du Zoo');
            $this->mail->addAddress('Zoo.arcadia1960@gmail.com', 'Arcadia');

            $this->mail->Subject = $contact->title;
            $this->mail->Body = "<p>{$contact->description}</p><p>Répondre à : {$contact->email}</p>";

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'envoi de l'email de contact : " . $this->mail->ErrorInfo);
            return false;
        }
    }

    public function sendUserCreationEmail(string $userEmail, string $userRole)
    {
        try {
            $this->mail->setFrom('Zoo.arcadia1960@gmail.com', 'Zoo Arcadia');
            $this->mail->addAddress($userEmail);

            $this->mail->Subject = "Bienvenue dans l'équipe de Zoo Arcadia!";
            $this->mail->Body = "<p>Bonjour,</p>
                                <p>Votre compte de <strong>{$userRole}</strong> a été créé avec succès.</p>
                                <p>Votre nom d'utilisateur est : {$userEmail}</p>
                                <p>Pour obtenir votre mot de passe, veuillez contacter l'administrateur.</p>
                                <p>Cordialement, <br>L'équipe de Zoo Arcadia</p>";

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'envoi de l'email de bienvenue : " . $this->mail->ErrorInfo);
            return false;
        }
    }
}
