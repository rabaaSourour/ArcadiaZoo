<div class="container text-bg-secondary rounded mt-5">
    <h2 class="card-title text-center text-bg-primary rounded p-3">Laissez un avis</h2>
    <form method="post" action="/review/addReview">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        <div class="mb-3 pt-3">
            <label for="PseudoInput" class="form-label">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" id="PseudoInput" required>
        </div>
        <div class="mb-3">
            <label for="commentText" class="form-label">Commentaire</label>
            <textarea name="review" class="form-control" id="commentText" rows="3" required></textarea>
        </div>
        <div class="text-center pb-3">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
    <?php
    // Afficher un message de succès si un avis a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<div class='alert alert-success'>Merci pour votre avis, il sera examiné avant publication.</div>";
    }
    ?>
</div>
