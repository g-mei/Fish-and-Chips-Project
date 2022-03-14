const modals = document.querySelectorAll('.modal');
const addModal = document.getElementById('addModal');
const actionSection = document.querySelectorAll('.actionSection');
const openModalButtons = document.querySelectorAll('.openModal');
const closeModalButtons = document.querySelectorAll('.closeModal');

const addFoodModal = document.getElementById('addFoodModal');
const openFoodModalButtons = document.querySelectorAll('.openFoodModal');

/**
 * 1. This goes through all buttons with a class of openModal.
 * 2. When the button is clicked, it checks for the button with that specific data-label.
 * 3. If the data label is add, it will remove the hidden class from the add modal.
 * 4. If the data label is edit or delete, if will go through all the modals and checking if the modal id is "data-label*#*id*"
 * 4. If so, that specific modal's hidden class will be removed.
 */

openModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        const btnLabel = button.getAttribute('data-label');
        const btnId = button.getAttribute('data-id');

        if(btnLabel === 'add') {
            addModal.classList.remove('hidden');
            addModal.classList.add('visible');
        }
        
        modals.forEach(modal => {
            if(modal.id === `${btnLabel}#${btnId}`){
                modal.classList.remove('hidden');
                modal.classList.add('visible');
            }
        });
    });
});

//hides all modals when you click a button with a class of closeModal
closeModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnLabel = button.getAttribute('data-label');

        if(btnLabel === 'cancel add') {
            addModal.classList.add('hidden');
            addModal.classList.remove('visible');
            addFoodModal.classList.add('hidden');
            addFoodModal.classList.remove('visible');
        }

        modals.forEach(modal => {
            modal.classList.add('hidden');
            modal.classList.remove('visible');
        })
    });
});

//For food modal
openFoodModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        const btnLabel = button.getAttribute('data-label');
        const btnId = button.getAttribute('data-id');

        if(btnLabel === 'add') {
            addFoodModal.classList.remove('hidden');
            addFoodModal.classList.add('visible');
        }
        
        modals.forEach(modal => {
            if(modal.id === `${btnLabel}#${btnId}`){
                modal.classList.remove('hidden');
                modal.classList.add('visible');
            }
        });
    });
});