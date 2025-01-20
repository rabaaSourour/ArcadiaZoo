function deleteService(id) {
    const csrfToken = document.getElementById('csrf_token').value;
    if (confirm('Voulez-vous vraiment supprimer ce service ?')) {
        fetch(`/api/deleteService?id=${id}`,
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
                    alert('Service supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression du service.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}