const { event } = require('jquery');


require('./bootstrap');



// //btn
const btnRegister = document.getElementById('btn-register');
const btnLogin = document.getElementById('btn-login');
const btnEdit = document.getElementById('btn-edit');
const btnCreate = document.getElementById('btn-create');

const numericMin = ['rooms', 'beds', 'bathrooms'];
const stringMinMax = ['title', 'city', 'country', 'room_type', 'house_type'];
const nameCollection = ['titolo', 'indirizzo', 'metri quadri', 'stanze', 'letti', 'bagni', 'tipo di casa', 'tipo di stanza', 'descrizione'];
const inputCollection = document.getElementsByClassName('js-data');
const servicesCollection = document.getElementsByName('services[]');


let message;

if (btnRegister) {
    registerValidation();
} else if (btnLogin) {
    loginValidation();
} else if (btnEdit) {
    getAddEvent(btnEdit);

} else if (btnCreate) {
    getAddEvent(btnCreate);
}

function registerValidation() {
    btnRegister.addEventListener('click', function (event) {

        let preventDefaultRegister = false;

        const inputCollection = document.getElementsByClassName('js-data');

        const labelsCollection = document.getElementsByTagName('label');

        for (i = 0; i < inputCollection.length; i++) {
            if (inputCollection[i].value.length === 0) {
                printEmptyError(inputCollection[i], labelsCollection[i].textContent);
            } else {
                printExactError(inputCollection[i], labelsCollection[i].textContent);
            }
        }


        function printEmptyError(input, label) {
            const correctLabel = getCorrectedLabel(label);
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            error.innerHTML = `Attenzione! Il campo ${correctLabel} è obbligatorio`;
            if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            } else {
                error.remove();
            }
        }

        function errorToggle(input) {
            input.addEventListener('click', function () {
                if (input.parentNode.lastElementChild.tagName != 'INPUT') {
                    input.parentNode.lastElementChild.remove();
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
            if (input.value.length < 3) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            } else if (input.value.length > 20) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            } else if (!isNaN(input.value)) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    error.innerHTML = `Il nome non può essere un numero`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            }
        }

        function surnameValidation(input) {
            if (input.value.length < 3) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            } else if (input.value.length > 20) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            } else if (!isNaN(input.value)) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    error.innerHTML = `Il cognome non può essere un numero`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            }
        }

        function emailValidation(input) {
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!input.value.match(mailformat)) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Inserire un'email corretta`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            }
        }

        function passwordValidation(input) {
            if (input.value.length < 8) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                }
            }

        }

        function confirmPassword(input) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            const passwordToCheck = document.getElementById('password');
            console.log(input.value, passwordToCheck.value, input.value === passwordToCheck.value);
            if (input.value != passwordToCheck.value) {
                preventDefaultRegister = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    error.innerHTML = `Il campo e la password devono combaciare`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                };
            }
        }

        function getCorrectedLabel(label) {
            let correctLabel = label.slice(0, label.length - 2)
            return correctLabel;
        }

        if(preventDefaultRegister){
            event.preventDefault();
        }

    });

    /* END REGISTER VALIDATION */
}

function loginValidation() {
    btnLogin.addEventListener('click', function (event) {

        let preventDefaultLogin = false;

        const inputCollection = document.getElementsByClassName('login-data');
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
            if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            } else {
                error.remove();
            }
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
            if (!input.value.match(mailformat)) {
                preventDefaultLogin = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Inserire un'email corretta`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultLogin = true
                }
            }
        }

        function passwordValidation(input) {
            if (input.value.length < 8) {
                preventDefaultLogin = true;
                if (input.parentNode.lastElementChild.tagName === 'INPUT') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                    document.getElementById(input.parentNode.id).appendChild(error);
                    errorToggle(input);
                    preventDefaultLogin = true
                }
            }
        }

        function getCorrectedLabel(label) {
            let correctLabel = label.slice(0, label.length)
            return correctLabel;
        }

        console.log(preventDefaultLogin);
        if (preventDefaultLogin) {
            event.preventDefault();
        }
    });
}

/* END LOGIN VALIDATION */

function getAddEvent(button) {
    button.addEventListener('click', function (event) {
        let errorsAny = false;
        for (i = 0; i < inputCollection.length; i++) {
            if (inputCollection[i].value.length == 0) {
                console.log('uguale a 0');
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


            if (inputSearchBox.value === '') {

                const divToAppend = document.querySelector('.col-12.address');
                if (divToAppend.lastChild.tagName === 'DIV') {
                    const error = document.createElement('p');
                    error.classList.add('text-danger', 'm-0');
                    error.innerHTML = `Attenzione! Il campo indirizzo è obbligatorio`;

                    divToAppend.appendChild(error);
                    inputSearchBox.addEventListener('click', function () {
                        error.remove();
                    });
                }
            }

            // address
            // if (inputCollection[i].name === 'address') {
            //     if (inputCollection[i].value.length < 7) {
            //         message = `Attenzione! l'indirizzo non può avere meno di 7 caratteri`;
            //         tagPrinter(inputCollection[i], message);
            //         errorsAny = true;

            //     } else if (inputCollection[i].value.length > 200) {
            //         message = `Attenzione! l'indirizzo non può avere più di 200 caratteri`;
            //         tagPrinter(inputCollection[i], message);
            //         errorsAny = true;

            //     } else if (!isNaN(inputCollection[i].value)) {
            //         message = `Attenzione! l'indirizzo non può essere solo numeri`;
            //         tagPrinter(inputCollection[i], message);
            //         errorsAny = true;
            //     }
            // }

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
            }else{
                console.log('tutto giusto');
                errorsAny= false;
            }

        }

        let c = 0;
        servicesCollection.forEach(service => {
            if(service.checked){
                c = c + 1;
            }
        });

        if(c < 1){
            const servicesDiv = document.querySelector('.row.g-3').children[9];
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (servicesDiv.lastChild.tagName != 'P') {
                error.innerHTML = `Attenzione! Inserire almeno un servizio!`;
                servicesDiv.appendChild(error);
                errorsAny = true;
            }else{
                error.remove();
            }
        }

        const descriptionDiv = document.querySelector('.row.g-3').children[10];
        if (descriptionDiv.children[1].value.length < 1) {
            const error = document.createElement('p');
            error.classList.add('text-danger', 'm-0');
            if (descriptionDiv.lastChild.tagName != 'P') {
                error.innerHTML = `Attenzione! Inserire almeno un servizio!`;
                descriptionDiv.insertBefore(error, descriptionDiv.lastElementChild);
                errorsAny = true;
            }else{
                error.remove();
            }
        }


    });
}

function tagPrinter(input, message) {
    const errorTag = document.createElement('p');
    errorTag.classList.add('text-danger', 'mb-0');
    //questo verifica che nn ci sia gia un p appeso
    if (input.parentNode.lastElementChild.tagName === 'INPUT') {
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
        if (input.parentNode.lastElementChild.tagName != 'INPUT') {
            input.parentNode.lastElementChild.remove();
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
let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
let searchBoxHTML = ttSearchBox.getSearchBoxHTML();
let address = document.querySelector('.address');

address.append(searchBoxHTML);

ttSearchBox._container.classList.add('m-0');
ttSearchBox._container.firstChild.style.padding = '6px';
ttSearchBox._container.firstChild.style.borderRadius = '5px';

let inputSearchBox = ttSearchBox._container.firstChild.children[2];
inputSearchBox.name = 'address';
inputSearchBox.id = 'address';
inputSearchBox.placeholder = 'Inserire l\'indirizzo';
inputSearchBox.classList.add('js-data');

// btnCreate.addEventListener('click', function () {
//     if (inputSearchBox.value === '') {

//         const divToAppend = document.querySelector('.col-12.address');
//         if (divToAppend.lastChild.tagName === 'DIV') {
//             const error = document.createElement('p');
//             error.classList.add('text-danger', 'm-0');
//             error.innerHTML = `Attenzione! Il campo indirizzo è obbligatorio`;

//             divToAppend.appendChild(error);
//             inputSearchBox.addEventListener('click', function () {
//                 error.remove();
//             });
//         }
//     }
// })
  /* TOMTOM SEARCHBOX */

