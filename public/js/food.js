function deleteFood(id) {
    const csrfToken = document.getElementById('csrf_token').value;
    if (confirm('Voulez-vous vraiment supprimer cette nourriture ?')) {
        fetch(`/api/deleteFood?id=${id}`,
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ csrf_token: csrfToken })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('nourriture supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression du nourriture.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}