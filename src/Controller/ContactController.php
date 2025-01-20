<?php

namespace App\Controller;

use App\Model\Contact;
use App\Services\Mailer;
use App\Services\CSRFToken;

class ContactController {

    public function show(): array
    {
        return [
            'page' => 'contact',
            'variables' => []
        ];
    }

    public function sendContactMail(): array
    {
        $message = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!CSRFToken::validate($_POST['csrf_token'] ?? '')) {
                header('Location: /error/server-error');
                die;
            }
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $email = $_POST['email'] ?? '';

        $contact = new Contact($title, $description, $email);
        if ($contact->validate()) {
            $mailer = new Mailer();
            $sendStatus = $mailer->sendContactEmail($contact);

            if ($sendStatus) {
                $message = "<div id='message' class='text-center text-success pt-3'>Votre demande a bien été envoyée.</div>";
            } else {
                $message = "<div id='message' class='text-center text-danger pt-3'>Erreur lors de l'envoi du message.</div>";
            }
        } else {
            $message = "<div id='message' class='text-center text-danger pt-3'>Veuillez remplir tous les champs correctement.</div>";
        }
    }
    return [
        'page' => 'contact',
        'variables' => [
            'message' => $message
        ]
    ];
}

}

