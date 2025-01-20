document.addEventListener('DOMContentLoaded', () => {
    const validateBtns = document.querySelectorAll('.validate-btn');
    const reviewsContainer = document.querySelector('.reviews');
    const reviews = Array.from(document.querySelectorAll('.review'));
    let removedCount = 0;
    const csrfToken = document.getElementById('csrf_token').value;
    validateBtns.forEach((validateBtn) => {
        validateBtn.addEventListener('click', () => {
            const reviewId = validateBtn.getAttribute('data-review-id');
            const review = validateBtn.parentElement.parentElement;
            validateReview(reviewId, csrfToken).then((data) => {
                if(data.status === 'error') {
                    throw new Error(data.message);
                } else {
                    review.remove();
                    removedCount++;
                    if(reviews.length - removedCount === 0) {
                        reviewsContainer.innerHTML = '<p>Aucun avis en attente de validation</p>'
                    }
                }
            }); 
        })
    })

    const removeBtns = document.querySelectorAll('.delete-btn');
    removeBtns.forEach((removeBtn) => {
        removeBtn.addEventListener('click', () => {
            const reviewId = removeBtn.getAttribute('data-review-id');
            const review = removeBtn.parentElement.parentElement;
            deleteReview(reviewId, csrfToken).then((data) => {
                if(data.status === 'error') {
                    throw new Error(data.message);
                } else {
                    review.remove();
                    removedCount++;
                    if(reviews.length - removedCount === 0) {
                        reviewsContainer.innerHTML = '<p>Aucun avis en attente de validation</p>'
                    }
                }
            }); 
        })
    })
})

async function validateReview(reviewId, csrfToken) {
    const body = new FormData();
    body.append('id', reviewId);
    body.append('csrf_token', csrfToken);
    const response = await fetch('/api/validateReview', {
        method : 'POST',
        body : body
    });
    const data = await response.json();

    return data;
}

async function deleteReview(reviewId, csrfToken) {
    const body = new FormData();
    body.append('id', reviewId);
    body.append('csrf_token', csrfToken);
    const response = await fetch('/api/deleteReview', {
        method : 'POST',
        body : body
    });
    const data = await response.json();

    return data;
}