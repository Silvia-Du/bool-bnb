/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/*user
testi: min:3 max:255
email: che ci sia chiocciola e punto?...classe di bootstrap
isNan = non a number = true nn è un numero
split('-'), reverse(), join();
password: lunghezza, car.speciali, numero
 
bonus: immagine
 
*/

const bntRegister = document.getElementById('btn-register');

// const title =  document.querySelector('.edit.title');
// const title =  document.querySelector('.create.title');


// let eMailToCheck;

// console.log(nameSurname);

bntRegister.addEventListener('click', function () {
    let check = true;

    // const inputCollection = document.getElementsByClassName('js-data');
    const inputCollection = document.getElementsByClassName('js-data');
    const labelsCollection = document.getElementsByTagName('label');

    const name = document.querySelector('.name.register');
    const surname = document.querySelector('.surname.register');
    const dateOfBirth = document.querySelector('.date-of-birth.register');
    const eMail = document.querySelector('.email.register');
    const password = document.querySelector('.password.register');
    const passwordConfirm = document.querySelector('.password-confirm.register');

    if (check) {
        event.preventDefault();
    }

    for (i = 0; i < inputCollection.length; i++) {
        // console.log(inputCollection[i].parentNode.lastChild.tagName);

        if (inputCollection[i].value.length === 0) {
            printEmptyError(inputCollection[i], labelsCollection[i].textContent)
        } else {
            printExactError(inputCollection[i], labelsCollection[i].textContent);
        }
    }


    function printEmptyError(input, label) {

        const correctLabel = getCorrectedLabel(label);
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        error.innerHTML = `Attenzione! Il campo ${correctLabel} è obbligatiorio`;
        if (input.parentNode.lastChild.tagName === 'INPUT') {
            document.getElementById(input.parentNode.id).appendChild(error);
            errorToggle(input);
        } else {
            error.remove();
        }
    }

    function errorToggle(input) {
        // console.log(input);
        input.addEventListener('click', function () {
            if (input.parentNode.lastChild.tagName != 'INPUT') {
                input.parentNode.lastChild.remove();
            }
        })
    }

    function printExactError(input, label) {
        // console.log(input);
    }

    function getCorrectedLabel(label) {
        let correctLabel = label.slice(0, label.length - 2)
        return correctLabel;
    }
});





