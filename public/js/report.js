function toggleReports(animalId) {
    const reportList = document.getElementById('report-' + animalId);
    
    if (reportList.style.display === "none" || reportList.style.display === "") {
        reportList.style.display = "block";
    } else {
        reportList.style.display = "none";
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
        
            const animalId = modalBtn.getAttribute('data-animal-id');

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