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
const bntRegister = document.getElementById('btn-register');
const btnLogin = document.getElementById('btn-login');
const btnEdit = document.getElementById('btn-edit');

bntRegister.addEventListener('click', function () {

    const inputCollection = document.getElementsByClassName('js-data');
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
        if(input.id === 'name'){
            nameValidation(input);
        }else if(input.id === 'surname'){
            surnameValidation(input);
        }else if(input.id === 'email'){
            emailValidation(input);
        }else if(input.id === 'password'){
            passwordValidation(input);
        }else if(input.id === 'password-confirm'){
            confirmPassword(input);
        }
    }

    function nameValidation(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(input.value.length < 3){
            error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else if(input.value.length > 20){
            error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else if(!isNaN(input.value)){
            error.innerHTML = `Il nome non può essere un numero`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }
    }

    function surnameValidation(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(input.value.length < 3){
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                error.innerHTML = `Il nome deve contenere più di 3 caratteri`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else if(input.value.length > 20){
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                error.innerHTML = `Il nome deve contenere meno di 20 caratteri`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else if(!isNaN(input.value)){
            error.innerHTML = `Il cognome non può essere un numero`;
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }
    }

    function emailValidation(input){
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(!input.value.match(mailformat)){
            if (input.parentNode.lastChild.tagName === 'INPUT') {
                error.innerHTML = `Inserire un'email corretta`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }
    }

    function passwordValidation(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(input.value.length < 8){
            error.innerHTML = `Inserire una password con almeno 8 caratteri`;
            document.getElementById(input.parentNode.id).appendChild(error);
            errorToggle(input);
        }

    }

    function confirmPassword(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        const passwordToCheck = document.getElementById('password');
        if(input.value != passwordToCheck.value){
            error.innerHTML = `Il campo e la password non combaciano`;
            document.getElementById(input.parentNode.id).appendChild(error);
            errorToggle(input);
        }
    }

    function getCorrectedLabel(label) {
        let correctLabel = label.slice(0, label.length - 2)
        return correctLabel;
    }
});




//collection
const loginCollection = document.getElementsByClassName('login-data');
//data condivisi
const eMail =  document.getElementById('email');
const surname =  document.getElementById('surname');
const name =  document.getElementById('name');
const password =  document.getElementById('password');
const numericMin = ['rooms', 'beds', 'bathrooms'];
const stringMinMax = ['title', 'city', 'country', 'room_type', 'house_type'];

const title =  document.querySelector('.edit.title');

let errorsAny = false;
btnEdit.addEventListener('click', function(){

    console.log('sono dentro');
    const editCollection = document.getElementsByClassName('edit-data');

    for(i=0; i< editCollection.length ; i++){

        if(editCollection[i].value.length == 0){
            alert(`Attenzione! il campo ${editCollection[i].name} è obbligatorio`);
            errorsAny = true;
        }

        if(editCollection[i].name === 'mq'){
            if(editCollection[i].value < 30){
                alert(`Attenzione! la dimensione deve essere almeno di 30 mq`)
                errorsAny = true;
            }
            // else if(isNaN(editCollection[i].value)){
            //     alert(`Attenzione! il valore di ${editCollection[i].name} deve essere un numero` );
            //     errorsAny = true;
            // }
        }
        if(editCollection[i].name === 'address'){
            if(editCollection[i].value.length < 7 || editCollection[i].value.length >200){
                alert(`Attenzione! l'indirizzo deve avere almeno 7 caratteri e non superare i 200`)
                errorsAny = true;
            }
            // else if(!isNaN(editCollection[i].value)){
            //     alert(`Attenzione! il valore di ${editCollection[i].name} non può essere un numero` );
            //     errorsAny = true;
            // }
        }

        if(stringMinMax.includes(editCollection[i].name)){

            if(editCollection[i].value.length < 3){
                alert(`Attenzione! il valore di ${editCollection[i].name} deve essere superiore a 3 caratteri` );
                errorsAny = true;
            }
            // else if(!isNaN(editCollection[i].value)){
            //     alert(`Attenzione! il valore di ${editCollection[i].name} non può essere un numero` );
            //     errorsAny = true;
            // }
        }

        if(numericMin.includes(editCollection[i].name)){

            if(editCollection[i].value < 1 ){
                alert(`Attenzione! il valore di ${editCollection[i].name} deve avere valore minimo 1` )
                errorsAny = true;
            }
            // else if(isNaN(editCollection[i].value)){
            //     alert(`Attenzione! il valore di ${editCollection[i].name} deve essere un numero` );
            //     errorsAny = true;
            // }
        }

    }

    console.log(errorsAny);
    if(errorsAny){
        event.preventDefault();
        // errorsAny = false;
    }

});



// btnLogin.addEventListener('click', function(){
//     let errorsAny = false;
//     while(errorsAny = true){
//         event.preventDefault();
//         errorsAny = false;
//         for(i=0; i< loginCollection.length ; i++){
//             if(loginCollection[i].value.length == 0){
//                 alert(`Attenzione! il campo ${loginCollection[i].name} è obbligatorio`);
//                 errorsAny = true;
//             }
//         }
//         if(password.value.length < 8 && password.value.length != 0){
//             alert(`Attenzione! il campo ${password.name} deve avere minimo 8 caratteri`);
//             errorsAny = true;
//         }
//         console.log(errorsAny);
//     }
//     //va messo nell'html del form il codice per la verifica e-mail
// })






