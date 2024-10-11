<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<div class="container text-bg-secondary mt-5">

<div class="mb-3 pt-3">
<label for="PseudoInput" class="form-label">Pseudo</label>
<input type="text" class="form-control" id="PseudoInput">
</div>

<div class="mb-3">
<label for="commentText" class="form-label">Commentaire</label>
<textarea class="form-control style= height: 100px" id="commentText" rows="3"></textarea>
</div>

<div class="text-center pb-3">
<button type="submit" class="btn btn-primary">Envoyer</button>
</div>

</div>
