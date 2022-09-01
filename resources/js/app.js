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

// //btn
const btnRegister = document.getElementById('btn-register');
const btnLogin = document.getElementById('btn-login');
const btnEdit = document.getElementById('btn-edit');
const btnCreate = document.getElementById('btn-create');

const numericMin = ['rooms', 'beds', 'bathrooms'];
const stringMinMax = ['title', 'city', 'country', 'room_type', 'house_type'];
const nameCollection = ['titolo', 'indirizzo', 'città', 'nazione', 'metri quadri', 'stanze', 'letti', 'bagni', 'tipo di abitazione', 'stanza', 'descrizione'];
const inputCollection = document.getElementsByClassName('js-data');

let message;

if (btnRegister) {
    registerValidation();
} else if (btnLogin) {
    loginValidation();
} else if (btnEdit) {
    console.log('esiste edit');
    getAddEvent(btnEdit);

} else if (btnCreate) {
    console.log('esiste create');
    getAddEvent(btnCreate);
}

function registerValidation() {
    let preventDefaultRegister = false;
    btnRegister.addEventListener('click', function () {
        console.log(preventDefaultRegister);
        if (preventDefaultRegister) {
            event.preventDefault();
        }

        const inputCollection = document.getElementsByClassName('js-data');
        console.log(inputCollection);
        const labelsCollection = document.getElementsByTagName('label');

        for (i = 0; i < inputCollection.length; i++) {
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
            error.innerHTML = `Attenzione! Il campo ${correctLabel} è obbligatorio`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            } else {
                error.remove();
            }
        }

        function errorToggle(input) {
            input.addEventListener('click', function () {
                if (input.parentNode.lastChild.tagName != 'INPUT') {
                    input.parentNode.lastChild.remove();
                }
            })
        }

        function printExactError(input) {
            if (input.id === 'name') {
                nameValidation(input);
            } else if (input.id === 'surname') {
                surnameValidation(input);
            } else if (input.id === 'email') {
                emailValidation(input);
            } else if (input.id === 'password') {
                passwordValidation(input);
            } else if (input.id === 'password-confirm') {
                confirmPassword(input);
            }
        }

        function nameValidation(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (input.value.length < 3) {
                error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else if (input.value.length > 20) {
                error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else if (!isNaN(input.value)) {
                error.innerHTML = `Il nome non può essere un numero`;
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else {
                preventDefaultRegister = false;
            }
        }

        function surnameValidation(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (input.value.length < 3) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else if (input.value.length > 20) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else if (!isNaN(input.value)) {
                error.innerHTML = `Il cognome non può essere un numero`;
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else {
                preventDefaultRegister = false;
            }
        }

        function emailValidation(input) {
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (!input.value.match(mailformat)) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Inserire un'email corretta`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else {
                preventDefaultRegister = false
            }
        }

        function passwordValidation(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (input.value.length < 8) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                }
            } else {
                preventDefaultRegister = false
            }

        }

        function confirmPassword(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            const passwordToCheck = document.getElementById('password');
            if (input.value != passwordToCheck.value) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Il campo e la password devono combaciare`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultRegister = true
                };
            } else {
                preventDefaultRegister = false
            }
        }

        function getCorrectedLabel(label) {
            let correctLabel = label.slice(0, label.length - 2)
            return correctLabel;
        }
    });
    /* END REGISTER VALIDATION */
}

function loginValidation() {
    let preventDefaultLogin = false;
    btnLogin.addEventListener('click', function () {
        if (preventDefaultLogin) {
            event.preventDefault();
        }

        const inputCollection = document.getElementsByClassName('login-data');
        console.log(inputCollection);
        const labelsCollection = document.getElementsByTagName('label');

        for (i = 0; i < inputCollection.length; i++) {
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
            error.innerHTML = `Attenzione! Il campo ${correctLabel} è obbligatorio`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            } else {
                error.remove();
            }
        }

        function errorToggle(input) {
            input.addEventListener('click', function () {
                if (input.parentNode.lastChild.tagName != 'INPUT') {
                    input.parentNode.lastChild.remove();
                }
            })
        }

        function printExactError(input) {
            if (input.id === 'email') {
                emailValidation(input);
            } else if (input.id === 'password') {
                passwordValidation(input);
            }
        }

        function emailValidation(input) {
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (!input.value.match(mailformat)) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Inserire un'email corretta`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultLogin = true
                }
            } else {
                preventDefaultLogin = false
            }
        }

        function passwordValidation(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (input.value.length < 8) {
                if (input.parentNode.lastChild.tagName === 'INPUT') {
                    error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultLogin = true
                }
            } else {
                preventDefaultLogin = false
            }
        }

        function getCorrectedLabel(label) {
            let correctLabel = label.slice(0, label.length)
            return correctLabel;
        }
    });
}

/* END LOGIN VALIDATION */
function getAddEvent(button) {

    button.addEventListener('click', function (event) {

        let errorsAny = false;
        console.log('riparto');
        for (i = 0; i < inputCollection.length; i++) {
            if (inputCollection[i].value.length == 0) {
                message = `Attenzione! il campo ${nameCollection[i]} è obbligatorio`;
                tagPrinter(inputCollection[i], message);
                errorsAny = true;
            }

            //mq
            if (inputCollection[i].name === 'mq') {
                if (inputCollection[i].value < 30) {
                    message = `Attenzione! la dimensione deve essere almeno di 30 mq`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;
                } else if (isNaN(inputCollection[i].value)) {
                    message = `Attenzione! il valore dei metri quadri deve essere un numero`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;
                }
            }

            // address
            if (inputCollection[i].name === 'address') {
                if (inputCollection[i].value.length < 7) {
                    message = `Attenzione! l'indirizzo non può avere meno di 7 caratteri`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;

                } else if (inputCollection[i].value.length > 200) {
                    message = `Attenzione! l'indirizzo non può avere più di 200 caratteri`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;

                } else if (!isNaN(inputCollection[i].value)) {
                    message = `Attenzione! l'indirizzo non può essere solo numeri`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;
                }
            }

            //string Min
            if (stringMinMax.includes(inputCollection[i].name)) {

                if (inputCollection[i].value.length < 3) {
                    message = `Attenzione! il campo ${nameCollection[i]} deve avere almeno 3 caratteri`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;

                } else if (!isNaN(inputCollection[i].value)) {
                    message = `Attenzione! il valore di ${nameCollection[i]} non può essere un numero`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;
                }
            }

            // numeric min
            if (numericMin.includes(inputCollection[i].name)) {

                if (inputCollection[i].value < 1) {
                    message = `Attenzione! il valore di ${nameCollection[i]} deve avere valore minimo 1`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;

                } else if (isNaN(inputCollection[i].value)) {
                    message = `Attenzione! il valore di ${nameCollection[i]} deve essere un numero`;
                    tagPrinter(inputCollection[i], message);
                    errorsAny = true;
                }
            }

            if (errorsAny) {

                event.preventDefault();
            }

        }


    });
}

function tagPrinter(input, message) {
    console.log('dentro tag printer')
    const errorTag = document.createElement('p');
    errorTag.classList.add('text-danger', 'mb-0');
    //questo verifica che nn ci sia gia un p appeso
    if (input.parentNode.lastChild.tagName === 'INPUT') {
        const parentDiv = input.parentNode;
        errorTag.innerHTML = message
        parentDiv.appendChild(errorTag);
        if (input.name === 'image') {
            errorTag.classList.add('d-none');
        }
        errorToggle(input);
    } else {
        errorTag.remove();
    }

}

function errorToggle(input) {
    input.addEventListener('click', function () {
        if (input.parentNode.lastChild.tagName != 'INPUT') {
            input.parentNode.lastChild.remove();
        }
    })
}


/* TOMTOM SEARCHBOX */

let options = {
    searchOptions: {
        key: 'ieE6bIkIjKCULYNaPIeiocY8WifbHuDb',
        language: 'it-IT',
        limit: 10
    },
    autocompleteOptions: {
        key: 'ieE6bIkIjKCULYNaPIeiocY8WifbHuDb',
        language: 'it-IT'
    }
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
let address = document.querySelector('.address');

address.append(searchBoxHTML);

ttSearchBox._container.classList.add('m-0');
ttSearchBox._container.firstChild.style.padding = '6px';
ttSearchBox._container.firstChild.style.borderRadius = '5px';


let inputSearchBox = ttSearchBox._container.firstChild.children[2];
btnCreate.addEventListener('click', function () {
    let value = ttSearchBox._container.firstChild.children[2].value;
    console.log(value);
})
 /* TOMTOM SEARCHBOX */
