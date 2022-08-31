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


//btn
const bntRegister = document.getElementById('btn-register');
const btnLogin = document.getElementById('btn-login');
const btnEdit = document.getElementById('btn-edit');
//collection
const dataCollection = document.getElementsByClassName('js-data');
const loginCollection = document.getElementsByClassName('login-data');
const editCollection = document.getElementsByClassName('edit-data');
//data condivisi
const eMail =  document.getElementById('email');
const surname =  document.getElementById('surname');
const name =  document.getElementById('name');
const password =  document.getElementById('password');
const numericMin = ['rooms', 'beds', 'bathrooms'];
const stringMinMax = ['title', 'city', 'country', 'room_type', 'house_type'];


// const title =  document.querySelector('.edit.title');

// btnEdit.addEventListener('click', function(){

//     let errorsAny = false;

//     for(i=0; i< editCollection.length ; i++){

//         if(editCollection[i].value.length == 0){
//             alert(`Attenzione! il campo ${editCollection[i].name} è obbligatorio`);
//             errorsAny = true;
//         }
//         for(let data of numericMin){

//             if(editCollection[i].name == data){
//                 if(editCollection[i].value < 1){
//                     alert(`Attenzione! il valore minimo per ${editCollection[i].name} è 1` )
//                     errorsAny = true;
//                 }
//             }
//         }

//         for(let data of stringMinMax){
//             if(editCollection[i].name == data){
//                 if(editCollection[i].value.length < 3){
//                     alert(`Attenzione! il campo ${editCollection[i].name} deve avere minimo 3 caratteri`)
//                     errorsAny = true;
//                 }
//                 if(editCollection[i].value.length > 200){
//                     alert(`Attenzione! il campo ${editCollection[i].name} può avere massimo 200 caratteri`)
//                     errorsAny = true;
//                 }
//             }
//         }

//     }

//     if(errorsAny = true){
//         event.preventDefault();
//     }

// })


btnLogin.addEventListener('click', function(){
    let errorsAny = false;
        event.preventDefault();
        errorsAny = false;
        for(i=0; i< loginCollection.length ; i++){

            if(loginCollection[i].value.length == 0){
                alert(`Attenzione! il campo ${loginCollection[i].name} è obbligatorio`);
                errorsAny = true;
            }
        }

        if(password.value.length < 8 && password.value.length != 0){
            alert(`Attenzione! il campo ${password.name} deve avere minimo 8 caratteri`);
            errorsAny = true;
        }
        console.log(errorsAny);
    }
    //va messo nell'html del form il codice per la verifica e-mail

})




