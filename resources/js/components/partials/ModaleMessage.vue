<template>
    <!-- Modale eMail -->
    <div class="modal-content rounded-5 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h2 class="fw-bold mb-0">Contatta l'host</h2>
            <!-- Bottone chiusura modale -->

            <button @click="$emit('isShow', false)"
            type="button" class="btn cat-box rounded-circle" data-bs-dismiss="modal">

                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form @submit.prevent="sendMessage"
            class="">

                <label  for="floatingInput">Indirizzo eMail</label>
                <label for="floatingInput">Indirizzo eMail</label>
                    <!-- Indirizzo eMail -->
                    <input v-model="eMail"
                    type="eMail" class="form-control rounded-4 mb-1" id="floatingInput" placeholder="personabellissima@eMail.it" required>
                    <p v-if="showAlert" class="error">Errore</p>
                    <!-- <hr class="mt-4 mb-2"> -->
                    <label class="mt-2" for="floatingInput">Verifica indirizzo eMail</label>

                    <!-- Verifica Indirizzo eMail -->
                    <input v-model="eMailVerify"
                    type="eMail" class="form-control rounded-4 mb-1" id="floatingInput" placeholder="personabellissima@eMail.it" required>
                    <p v-if="showAlert" class="error">L'indirizzo e-mail è diverso dalla verifica</p>
                <hr class="my-4">

                <label for="floatingInput">Nome</label>
                    <!-- Nome mittente -->
                    <input v-model="name"
                    type="text" class="form-control rounded-4" id="floatingInput" placeholder="il tuo nome" required>
                <hr class="my-4">

                <div class="form-floating">
                    <!-- Text area messaggio -->

                    <textarea v-model="text" rows="5"
                    class="form-control" id="floatingTextarea" placeholder="il tuo messaggio" required></textarea>
                    <button
                    class="cat-box btn rounded-pill my-3" type="submit">
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
    props:{
        annId:Number
    },
    data() {
        return {
            name: '',
            eMail: '',
            eMailVerify: '',
            text: '',
            apiUrl: 'http://127.0.0.1:8000/api/announcements/message',

            showAlert: false,
            sending: false,
            success:false

        }
    },
    methods: {

        sendMessage(){

            if(this.eMailVerify != this.eMail){
                console.log(this.eMailVerify, this.eMail);
                this.showAlert = true;
                console.log('errore');
            }else{
                this.$emit('isShow', false);
                this.showAlert= false;
                //chiamata axios
                axios.post(this.apiUrl,{
                    message:{
                        'email': this.eMail,
                        'text': this.text,
                        'name': this.name,
                        'announcement': 6
                    }
                })
                .then(response =>{
                    this.sending = true;
                    console.log(response.data);
                    if(!response.data.success){

                        console.log('errore',this.success);
                    }
                    else{
                        this.success = true;
                        this.eMailVerify = '';
                        this.name='';
                        this.eMail= '';
                        this.text= 'Il tuo messaggio';
                    }
                })
            }

        }
    },
}
</script>

<style lang="scss" scoped>
    .modal-content{
        position: absolute;
        z-index: 999;
        top: 66%;
        left: 50%;
        transform: translate(-50%, 0);
        width: 50%;
        .error{
            color: red;
            font-size: 0.7rem;
        }
    }

.cat-box {
    border-radius: 15px;
    background-color: #ffffff;
    border: 1px solid #f06449;
    transition: ease-out 0.5s;
    outline: none;

    &:hover {
        cursor: pointer;
        box-shadow: inset 0 172px 0 0 #EF6351;
        color: white;

    }
}
</style>
