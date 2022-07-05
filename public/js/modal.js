const modals = document.querySelectorAll('.modal');
const addModal = document.getElementById('addModal');
const actionSection = document.querySelectorAll('.actionSection');
const openModalButtons = document.querySelectorAll('.openModal');
const closeModalButtons = document.querySelectorAll('.closeModal');

const addFoodModal = document.getElementById('addFoodModal');
const openFoodModalButtons = document.querySelectorAll('.openFoodModal');

const maxSize = 33554432;

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
        const btnLabel = button.getAttribute('data-label');
        const btnId = button.getAttribute('data-id');
        

        if(btnLabel === 'add') {
            addModal.classList.remove('hidden');
        }
        
        modals.forEach(modal => {
            if(modal.id === `${btnLabel}#${btnId}`){
                modal.classList.remove('hidden');
            }

            if(btnLabel === 'editFood'){
                const editFoodImgSize = document.getElementById(`edit_food_image#${btnId}`);
                editFoodImgSize.addEventListener('change', function(){
                    if(this.files[0].size > maxSize){
                        alert("Image is too large. Maximum file size is 32MB");
                        this.value = "";
                    };
                });
            }

            if(btnLabel === 'editPack'){
                const editPackImgSize = document.getElementById(`edit_pack_image#${btnId}`);
                editPackImgSize.addEventListener('change', function(){
                    if(this.files[0].size > maxSize){
                        alert("Image is too large. Maximum file size is 32MB");
                        this.value = "";
                    };
                });
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
            addFoodModal.classList.add('hidden');
        }

        modals.forEach(modal => {
            modal.classList.add('hidden');
        })
    });
});

//For food modal
openFoodModalButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const btnLabel = button.getAttribute('data-label');
        const btnId = button.getAttribute('data-id');

        if(btnLabel === 'add') {
            addFoodModal.classList.remove('hidden');
        }
        
       
        modals.forEach(modal => {
            if(modal.id === `${btnLabel}#${btnId}`){
                modal.classList.remove('hidden');
            }
        });
    });
});