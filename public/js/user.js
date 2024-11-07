function deleteUser(id) {
    if (confirm('Voulez-vous vraiment supprimer l\'utilisateur ?')) {
        fetch(`/api/deleteUser?id=${id}`,
            {
                method: 'POST',
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