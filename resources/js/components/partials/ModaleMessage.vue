<template>
    <!-- Modale Email -->
    <div class="modal-content rounded-5 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h2 class="fw-bold mb-0">Contatta l'host</h2>
            <!-- Bottone chiusura modale -->
            <button @click="$emit('isShow', false)"
            type="button" class="btn btn-outline-secondary rounded-circle" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form @submit.prevent="sendMessage"
            class="">
                <label for="floatingInput">Indirizzo Email</label>
                    <!-- Indirizzo email -->
                    <input v-model="email"
                    type="email" class="form-control rounded-4" id="floatingInput" placeholder="personabellissima@email.it">
                <hr class="my-4">

                <label for="floatingInput">Nome</label>
                    <!-- Indirizzo email -->
                    <input v-model="name"
                    type="text" class="form-control rounded-4" id="floatingInput" placeholder="il tuo nome">
                <hr class="my-4">

                <div class="form-floating">
                    <!-- Text area messaggio -->
                    <textarea v-model="text"
                    class="form-control" id="floatingTextarea"></textarea>
                    <button
                    class="btn btn-outline-secondary my-3" type="submit">
                        Invia messaggio
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModaleMessage',
    data() {
        return {
            name: '',
            email: '',
            text: '',
            apiUrl: 'http://127.0.0.1:8000/api/announcements/message',

        }
    },
    methods: {
        sendMessage(){
            //chiamata axios
            axios.post(this.apiUrl,{
                message:{
                    'email': this.email,
                    'text': this.text,
                    'name': this.name
                }
            })
            .then(response =>{

                console.log(response);
                // if(!response.data.success){
                //     this.errors = response.data.errors;
                //     console.log(this.errors);
                // }else{
                //     this.success = true;
                //     this.errors = {};
                //     this.name= '';
                //     this.surname= '';
                //     this.title='';
                //     this.eMail= '';
                //     this.content= '';
                // }
            })
        }
    },
}
</script>

<style lang="scss" scoped>
    .modal-content{
        position: absolute;
        z-index: 999;
        top: 85%;
        left: 50%;
        transform: translate(-50%, 0);
        width: 50%;
    }


</style>
