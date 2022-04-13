const modals = document.querySelectorAll('.modal');
const openModalButtons = document.querySelectorAll('.openModal');
const openPackModalButtons = document.querySelectorAll('.openPackModal');
const closeModalButtons = document.querySelectorAll('.closeModal');
const closePackModalButtons = document.querySelectorAll('.closePackModal');

/**
 * 1. This goes through all buttons with a class of openModal.
 * 2. When the button is clicked, it checks for the button with that specific data-label.
 * 3. If the data label is add, it will remove the hidden class from the add modal.
 * 4. If the data label is edit or delete, if will go through all the modals and checking if the modal id is "data-label*#*id*"
 * 4. If so, that specific modal's hidden class will be removed.
 */

openModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnId = button.getAttribute('data-id');

        modals.forEach(modal => {
            if(modal.id === `addToCart#${btnId}`){
                modal.classList.remove('hidden');
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
            modals.forEach(modal => {
                modal.classList.add('hidden');
            })
        }

        modals.forEach(modal => {
            modal.classList.add('hidden');
        })
    });
});

//for the pack modal
openPackModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnId = button.getAttribute('data-id');

        modals.forEach(modal => {
            if(modal.id === `addToCartPack#${btnId}`){
                modal.classList.remove('hidden');
            }
        });
    });
});

closePackModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnLabel = button.getAttribute('data-label');

        if(btnLabel === 'cancel add pack') {
            modals.forEach(modal => {
                modal.classList.add('hidden');
            })
        }

        modals.forEach(modal => {
            modal.classList.add('hidden');
        })
    });
});