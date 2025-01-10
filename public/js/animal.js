function deleteAnimal(id) {
    if (confirm('Voulez-vous vraiment supprimer cette animal ?')) {
        fetch(`/api/deleteAnimal?id=${id}`,
            {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Animal supprimé avec succès.');
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression de l\'animal.');
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}

function toggleAnimals(habitatId) {
    const selectedAnimalList = document.getElementById(`animals-${habitatId}`);
    if (selectedAnimalList.style.display === "none" || selectedAnimalList.style.display === "") {
        selectedAnimalList.style.display = "block";
    } else {
        selectedAnimalList.style.display = "none";
    }
}

async function showAnimalDetails() {
    const modalBtns = Array.from(document.querySelectorAll('[data-action="show-details"]'));
    const dialog = document.querySelector('#dialog-show-details');

    dialog.querySelector('.close-btn').addEventListener('click', () => {
        dialog.close();
    });

    modalBtns.forEach((modalBtn) => {
        modalBtn.addEventListener('click', () => {
            dialog.showModal();
            const animalCard = modalBtn.parentElement.parentElement.parentElement;
            const animalId = animalCard.getAttribute('data-animal-id');

            fetchAnimalDetails(animalId).then((data) => {
                fillDialogTemplate(dialog, data.animal, data.report);
            });
        })
    });
}

/**
 * @param { int } animalId - L'id de l'animal pour lequel on souhaite obtenir des informations
 */
async function fetchAnimalDetails(animalId) {
    const response = await fetch(window.location.origin + '/api/animalDetails?animalId=' + animalId);
    const data = await response.json();

    if(data.success === false) {
        throw new Error(data.error);
    }

    return data;
}

/**
 * Replis la boite de dialogue avec les details de l'animal
 * @param { HTMLDialogElement } dialog
 * @param { object } animal
 * @param { object } report
 */
function fillDialogTemplate(dialog, animal, report) {
    const template = document.querySelector('#template-animal-details').content.cloneNode(true);

    const rows = [
        ['.animal-name', animal.name],
        ['.report-details', report.details],
        ['.report-status', report.status],
        ['.report-food', report.food],
        ['.report-quantity', report.food_quantity],
        ['.report-last-check', report.last_check],
    ];

    rows.forEach((row) => {
        fillTemplateRow(template, row[0], row[1]);
    });

    const animalInfo = dialog.querySelector('.animal-info');
    if(animalInfo instanceof HTMLElement) {
        animalInfo.remove();
    }

    dialog.querySelector('.dialog-content').appendChild(template);
}

function fillTemplateRow(template, rowSelector, value) {
    if(value === undefined || value === null) {
        value = 'Inconnu(e)';
    }
    
    const text = document.createTextNode(value);
    template.querySelector(rowSelector).appendChild(text);
}

showAnimalDetails();