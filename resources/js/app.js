import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { forEach } from 'lodash';
import.meta.glob([
    '../img/**'
])


//Funzione per eliminare photo
function handleSubmitForm() {
    const formDelete = document.getElementById('form-delete');

    if (formDelete) {
        formDelete.submit();
    }

}

const btnDelete = document.getElementById('btn-delete');
btnDelete.addEventListener('click', handleSubmitForm);

