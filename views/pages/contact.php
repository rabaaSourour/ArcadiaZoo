<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<div class="container text-bg-secondary rounded mt-5">
    <form id="contactForm">
        <div class="mb-3 pt-3">
            <label for="EmailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="TitreInput" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre">
        </div>

        <div class="mb-3">
            <label for="DescriptionText" class="form-label">Déscription</label>
            <textarea class="form-control" id="description" rows="3" style="height: 300px;"></textarea>
        </div>

        <div class="text-center pb-3">
            <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>
        </div>
    </form>

    <div id="message" class="text-center text-success pt-3" style="display:none;">
        Votre email a bien été envoyé !
    </div>
</div>