function deleteUser(id) {
    const csrfToken = document.getElementById('csrf_token').value;
    if (confirm('Voulez-vous vraiment supprimer l\'utilisateur ?')) {
        fetch(`/api/deleteUser?id=${id}`,
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
                    alert('Utilisateur supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de l\'utilisateur.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}