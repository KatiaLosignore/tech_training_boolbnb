import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { forEach } from 'lodash';
import.meta.glob([
    '../img/**'
])


//Conferma di eliminazione apartment

const deleteButtons = document.querySelectorAll('.form_delete_apartment button[type="submit"]');


deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();

        const modal = document.getElementById('confirmModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const confirmDeleteBtn = modal.querySelector('.btn.btn-danger')

        confirmDeleteBtn.addEventListener('click', () => {
            button.parentElement.submit();
        });
    })
});



//Funzione per eliminare photo
function handleSubmitForm() {
    const formDelete = document.getElementById('form-delete');

    if (formDelete) {
        formDelete.submit();
    }

}

const btnDelete = document.getElementById('btn-delete');
btnDelete.addEventListener('click', handleSubmitForm);

