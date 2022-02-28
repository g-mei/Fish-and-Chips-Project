const modals = document.querySelectorAll('.modal');
const addModal = document.getElementById('addModal');
const actionSection = document.querySelectorAll('.actionSection');
const openModalButtons = document.querySelectorAll('.openModal');
const closeModalButtons = document.querySelectorAll('.closeModal');

/**
 * 1. This goes through all buttons with a class of openModal.
 * 2. When the button is clicked, it checks for the button with that specific aria-label.
 * 3. If the aria label is add, it will remove the hidden class from the add modal.
 * 4. If the aria label is edit or delete, if will go through all the modals and checking if the modal id is "*aria-label*#*id*"
 * 4. If so, that specific modal's hidden class will be removed.
 */

openModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        const btnLabel = button.ariaLabel;
        const btnId = button.getAttribute('data-id');

        if(btnLabel === 'add') {
            addModal.classList.remove('hidden');
        }
        
        modals.forEach(modal => {
            if(modal.id === `${btnLabel}#${btnId}`){
                modal.classList.remove('hidden');
            }
        });
    });
});

//hides all modals when you click a button with a class of closeModal
closeModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnLabel = button.ariaLabel;

        if(btnLabel === 'cancel add') {
            addModal.classList.add('hidden');
        }

        modals.forEach(modal => {
            modal.classList.add('hidden');
        })
    });
});


