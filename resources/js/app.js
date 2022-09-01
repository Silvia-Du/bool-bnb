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


/* START LOGIN VALIDATION */
let preventDefaultLogin = true;
btnLogin.addEventListener('click', function(){
    if(preventDefaultLogin){
        event.preventDefault();
    }

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
        if(input.id === 'email'){
            emailValidation(input);
        }else if(input.id === 'password'){
            passwordValidation(input);
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
        }else{
            preventDefaultRegister = false
        }
    }

    function passwordValidation(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(input.value.length < 8){
            if(input.parentNode.lastChild.tagName === 'INPUT'){
                error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else{
            preventDefaultRegister = false
        }
    }

    function getCorrectedLabel(label) {
        let correctLabel = label.slice(0, label.length )
        return correctLabel;
    }
});
/* END LOGIN VALIDATION */


/* START REGISTER VALIDATION */
let preventDefaultRegister = true;
bntRegister.addEventListener('click', function () {
    console.log(preventDefaultRegister);
    if(preventDefaultRegister){
        event.preventDefault();
    }

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
        }else{
            preventDefaultRegister = false;
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
        }else{
            preventDefaultRegister = false;
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
        }else{
            preventDefaultRegister = false
        }
    }

    function passwordValidation(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        if(input.value.length < 8){
            if(input.parentNode.lastChild.tagName === 'INPUT'){
                error.innerHTML = `Inserire una password con almeno 8 caratteri`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            }
        }else{
            preventDefaultRegister = false
        }

    }

    function confirmPassword(input){
        const error = document.createElement('p');
        error.classList.add('text-danger', 'm-0');
        const passwordToCheck = document.getElementById('password');
        if(input.value != passwordToCheck.value){
            if(input.parentNode.lastChild.tagName === 'INPUT'){
                error.innerHTML = `Il campo e la password devono combaciare`;
                document.getElementById(input.parentNode.id).appendChild(error);
                errorToggle(input);
            };
        }else{
            preventDefaultRegister = false
        }
    }

    function getCorrectedLabel(label) {
        let correctLabel = label.slice(0, label.length - 2)
        return correctLabel;
    }
});
/* END REGISTER VALIDATION */
