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
const dataCollection = document.getElementsByClassName('js-data');
const eMail =  document.getElementById('email');
const surname =  document.getElementById('surname');
const name =  document.getElementById('name');
// const title =  document.querySelector('.edit.title');
// const title =  document.querySelector('.create.title');


// let eMailToCheck;

let check = true;
// console.log(nameSurname);

bntRegister.addEventListener('click', function(){

    if(check = true){
        event.preventDefault();
    }

    // for (const data of dataCollection) {
    //     console.log(data.value.length);
    //     if(data.value.lenght === 0){
    //                 alert(`Attenzione! il campo ${data.value} è obbligatorio`);
    //             }
    //     if(data.value.length <= 0){
    //         alert(`Attenzione! il campo ${data.value} è obbligatorio`);
    //     }
    // }

    // dataCollection.forEach(element => {
    //     console.log(element.value);
    // });

    for(i=0; i< dataCollection.length ; i++){
        console.log(dataCollection[i].value);

        if(dataCollection[i].value.length == 0){
            alert(`Attenzione! il campo ${dataCollection[i].name} è obbligatorio`);
        }
    }
    // console.log(typeof name);
    // console.log(name.length);
    if(name.length < 3 || name.length > 100){
        alert('il campo nome deve essere compreso tra i 3 e i 100 caratteri')
    }
    if(surname.length < 3 || name.length > 100){
        alert('il campo cognome deve essere compreso tra i 3 e i 100 caratteri')
    }

    const eMailToCheck =  eMail.value.split('');
    console.log(eMailToCheck.includes('@'));
    if(eMailToCheck.includes('@'))

    console.log(eMail);
    console.log(eMailToCheck);


});



if(eMail.length == 0){
    alert('la mail è obbligatoria')
}






