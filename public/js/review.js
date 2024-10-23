$(document).ready(function() {
    // Pour la validation des avis
    $('.validate-btn').click(function(event) {
        event.preventDefault();
    
        var reviewId = $(this).data('review-id');
        var reviewDiv = $(this).closest('.review');
    
     // Vérifie si l'ID est correct
    
        $.post('/src/Admin/validateReview.php', { id: reviewId }, function(response) {
            console.log(response); // Vérifie la réponse du serveur
            if (response.status === 'success') {
                $('#message').text(response.message).show();
                reviewDiv.remove();
    
                setTimeout(function() {
                    $('#message').fadeOut();
                }, 3000);
    
                if ($('#comments .review').length === 0) {
                    $('#comments').html('<div class="alert alert-info text-center">Aucun nouvel avis en attente de validation.</div>');
                }
            } else {
                $('#message').text(response.message).show();
            }
        }, 'json').fail(function() {
            $('#message').text("Erreur lors de la validation.").show();
        });
    });
    

    $('.delete-btn').click(function(event) {
        event.preventDefault();
    
        var reviewId = $(this).data('review-id');
        var reviewDiv = $(this).closest('.review');
    
        // Vérifie si l'ID est correct
    
        $.post('/src/Admin/deleteReview.php', { id: reviewId }, function(response) {
            console.log(response); // Vérifie la réponse du serveur
            if (response.status === 'success') {
                $('#message').text(response.message).show();
                reviewDiv.remove();
    
                setTimeout(function() {
                    $('#message').fadeOut();
                }, 3000);
    
                if ($('#comments .review').length === 0) {
                    $('#comments').html('<div class="alert alert-info text-center">Aucun nouvel avis en attente de validation.</div>');
                }
            } else {
                $('#message').text(response.message).show();
            }
        }, 'json').fail(function() {
            $('#message').text("Erreur lors de la suppression.").show();
        });
    });
})