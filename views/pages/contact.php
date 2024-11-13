<div class="container text-bg-secondary rounded mt-5">
<h1 class="text-center bg-primary rounded pb-3 pt-3">Contactez le Zoo</h1>
    <form action="/Contact/sendContactMail" method="POST">
        <div class="form-group">
        <label for="email">Votre e-mail :</label>
        <input type="email" id="email" name="email" placeholder="name@example.com" required>
        </div>

        <div class="form-group mb-3">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group mb-3">
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="3" style="height: 300px;"></textarea>
        </div>

        <div class="text-center pb-3">
            <button type="submit" class="btn btn-primary" id="submit">Envoyer</button>
        </div>
    </form>

    <div id="message" class="text-center text-success pt-3" style="display:none;">
        Votre email a bien été envoyé !
    </div>
</div>