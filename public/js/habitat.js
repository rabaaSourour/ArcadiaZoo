function deleteHabitat(id) {
    const csrfToken = document.getElementById('csrf_token').value;
    if (confirm('Voulez-vous vraiment supprimer ce habitat ?')) {
        fetch(`/api/deleteHabitat?id=${id}`,
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
                    alert('Habitat supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de l\'habitat.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}