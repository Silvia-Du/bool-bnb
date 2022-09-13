<template>
    <div class="container pt-5">
         <!-- Header Annuncio -->
            <header class="mb-2 my-5">
                <div class="text-dark">
                    <div>
                        <!-- Titolo -->
                        <h2 class="d-flex align-items-center coral-text">
                            {{ apartamentDetails.title }}
                        </h2>
                        <span><a href="#" class="gray-text"></a></span>
                            {{ apartamentDetails.address }}
                        <div class="row flex-row-reverse mx-1 my-3">
                            <button class="btn btn-sm rounded-pill">
                            <i class="fa-regular fa-heart"></i>
                            Salva
                            </button>
                            <button class="btn btn-sm rounded-pill mx-2">
                            <i class="fa-solid fa-share-from-square"></i>
                            Condividi
                            </button>
                        </div>

                        <!-- Immagine -->
                        <div class="row align-items-md-stretch ">
                            <div class="col-md-8">
                                <div class="h-100 shadow-lg image-house">
                                 <!-- <img src="https://i.pinimg.com/originals/94/45/94/9445949707ee30f609bc44e20cd2bf62.jpg" class="image-fluid image-house"/> -->
                                 <img class="image-fluid image-house" :src="getImage(apartamentDetails.image)" :alt="apartamentDetails.title"/>
                                </div>
                            </div>

                            <!-- Tom Tom -->
                            <div class="col-md-4">
                                    <MapAnnDetails :announcmentsCollection="apartamentDetails"/>
                                <!-- <div class="h-100 shadow-lg image-house overflow-hidden" style="background-image: url('https://i.stack.imgur.com/WHCGy.png');">
                                </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </header>

        <!-- Body Annuncio -->
        <div class="row align-items-md-stretch">
            <div class="col-md-8">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="w-100">
                            <h3 class="coral-text">{{ userDetails.name }} {{ userDetails.surname }} - Nome Host</h3>
                            <span>{{ apartamentDetails.rooms }} ospiti - </span>
                            <span>{{ apartamentDetails.beds }} Camere da letto - </span>
                            <span>{{ apartamentDetails.beds }} letti - </span>
                            <span>{{ apartamentDetails.bathrooms }} bagni</span>
                        </div>

                        <div class="flex-shrink-0">
                            <a href="#" class="d-block link-dark text-decoration-none">
                                <img
                                src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                alt="mdo"
                                width="56"
                                height="56"
                                class="rounded-circle"
                                />
                            </a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center my-1">
                         <ul class="fa-ul">
                            <li class="gray-text my-2"><span class="fa-li"><i class="fa-solid fa-house fa-lg"></i></span>Self check-in</li>
                            <li class="gray-text"><span class="fa-li"><i class="fa-regular fa-calendar fa-lg"></i></span>Cancellazione gratuita entro il giorno 24 set</li>
                        </ul>
                    </div>

                    <!-- Descrizione Annuncio -->
                    <div class="d-flex align-items-center spacebar">
                        <span class="my-3">{{ apartamentDetails.description }}</span>
                    </div>

                </div>
            </div>


            <div class="col-md-4">
                <div class="h-100">

                    <!-- Servizi -->
                    <div class="mb-5">
                        <!-- Tasto prenota -->
                        <button class="show-location rounded-pill btn btn-lg w-100 mx-0 mb-2 bg-coral1 text-white">
                            Prenota
                        </button>

                        <h5 class="my-3">Cosa offre questa proprietà:</h5>
                        <div class="d-flex align-items-center my-1">
                            <ul class="fa-ul">
                                <li
                                v-for="(apartament_services, index) in apartamentDetails.services"
                                :key="`service:${index}`"
                                class="gray-text my-1"><span class="fa-li"></span>{{ apartament_services.name }}</li>
                                <!-- <li class="gray-text my-1"><span class="fa-li"><i class="fa-brands fa-pagelines fa-lg"></i></span>Giardino</li>
                                <li class="gray-text my-1"><span class="fa-li"><i class="fa-solid fa-wifi fa-lg"></i></span>Wifi</li>
                                <li class="gray-text"><span class="fa-li"><i class="fa-solid fa-utensils fa-lg"></i></span>Cucina</li> -->
                            </ul>
                        </div>

                        <button class="btn cat-box rounded-pill" type="button">
                            Mostra tutti i servizi
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Annuncio -->
        <div class="row align-items-md-stretch">
            <div class="col-md-8">
                <div>
                    <!-- Descrizione Host -->
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="#" class="d-block link-dark text-decoration-none">
                                <img
                                src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                alt="mdo"
                                width="56"
                                height="56"
                                class="rounded-circle"
                                />
                            </a>
                        </div>

                        <div class="mx-3">
                            <h3 class="coral-text">Host: {{ userDetails.name }} {{ userDetails.surname }}</h3>
                            <span class="gray-text">Membro da: {{ userDetails.created_at }}</span>
                        </div>

                    </div>

                    <!-- Info soggiorno -->
                    <div class="my-3 spacebar">
                        <h4 class="coral-text">Durante il tuo soggiorno:</h4>
                        <div class="d-flex align-items-center my-3">
                            <span>
                                Per qualsiasi necessità o informazione contattateci. Siamo disponibili ad organizzare piccole feste private o cene con Chef privato e catering. Oltre che ad un ampio servizio di esperienze come noleggio barche, sport acquatici e tanto altro ancora...
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda ratione officia excepturi asperiores, voluptatibus pariatur voluptatum. Nulla iste magnam perspiciatis deleniti tenetur, at aliquam placeat magni cupiditate quisquam aliquid a!
                            </span>
                        </div>
                    </div>

                    <!-- Caratteristiche -->
                    <div class="my-3 spacebar">
                        <div class="d-flex align-items-center my-3">
                            <ul class="fa-ul my-3">
                                <li class="px-3 my-3">
                                    <span class="fa-li"><i class="fa-solid fa-briefcase fa-xl"></i></span>
                                    <h5>Caratteristica</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam aperiam fugit nobis doloribus! Quod dignissimos reiciendis aut, deleniti ut non! Mollitia, corrupti veniam. Quam temporibus a incidunt quaerat cum eaque?</p>
                                </li>
                                <li class="px-3">
                                    <span class="fa-li"><i class="fa-solid fa-briefcase fa-xl"></i></span>
                                    <h5>Caratteristica</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam aperiam fugit nobis doloribus! Quod dignissimos reiciendis aut, deleniti ut non! Mollitia, corrupti veniam. Quam temporibus a incidunt quaerat cum eaque?</p>
                                </li>
                                <li class="px-3">
                                    <span class="fa-li"><i class="fa-solid fa-briefcase fa-xl"></i></span>
                                    <h5>Caratteristica</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam aperiam fugit nobis doloribus! Quod dignissimos reiciendis aut, deleniti ut non! Mollitia, corrupti veniam. Quam temporibus a incidunt quaerat cum eaque?</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li>Lingue: English, Français, Italiano</li>
                    <li>Tasso di risposta: 98%</li>
                    <li>Tempo di risposta: entro un'ora</li>
                </ul>
                <div class="h-100">
                    <!-- Tasto Messaggio -->
                    <div class="d-flex align-content-center">

                        <button @click="getModal()"
                        class="btn cat-box rounded-pill my-3">

                        Contatta l'host
                        </button>
                    </div>

                    <span class="fs-6 gray-text">
                        Per proteggere i tuoi pagamenti, non trasferire mai del denaro e non comunicare fuori dal sito web o dall'app di BoolBnb.
                    </span>

                </div>
            </div>
        </div>

            <div class="mb-5">
                <div class="my-5">
                    <!-- Da Sapere -->
                    <div>
                        <h4 class="coral-text">Da sapere</h4>
                        <div class="d-flex row g-4 mx-0 row-cols-1 row-cols-lg-3 my-3">
                            <div class="my-3">
                                <h5>Regole della casa</h5>
                                    <ul class="fa-ul mx-4">
                                        <li class="gray-text my-1">
                                            <span class="fa-li"><i class="fa-solid fa-clock fa-lg"></i></span>
                                            Check-in: 16:00 - 19:00
                                        </li>
                                        <li class="gray-text my-1">
                                            <span class="fa-li"><i class="fa-solid fa-clock fa-lg"></i></span>
                                            Check-out: 11:00
                                        </li>
                                        <li class="gray-text">
                                            <span class="fa-li"><i class="fa-solid fa-ban-smoking fa-lg"></i></span>
                                            Non è consentito fumare
                                        </li>
                                        <li class="gray-text">
                                            <span class="fa-li"><i class="fa-solid fa-paw fa-lg"></i></span>
                                            Animali ben accetti
                                        </li>
                                    </ul>
                            </div>

                            <!-- Salute e sicurezza -->
                            <div class="my-3">
                                <h5>Salute e sicurezza</h5>
                                <ul class="fa-ul mx-4">
                                    <li class="gray-text my-1">
                                        <span class="fa-li"><i class="fa-solid fa-spray-can-sparkles fa-lg"></i></span>
                                            Si applicano le pratiche di sicurezza per l'emergenza COVID-19
                                    </li>
                                    <li class="gray-text my-1">
                                        <span class="fa-li"><i class="fa-solid fa-house-medical fa-lg"></i></span>
                                        Rilevatore di monossido di carbonio
                                    </li>
                                    <li class="gray-text">
                                        <span class="fa-li"><i class="fa-solid fa-toolbox fa-lg"></i></span>
                                        Rilevatore di fumo
                                    </li>
                                </ul>
                            </div>

                            <!-- Termini cancellazione -->
                            <div class="my-3">
                                <h5>Termini di cancellazione</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="gray-text">
                                        Cancellazione gratuita entro il giorno 24 set.
                                    </li>
                                    <li class="gray-text">
                                        Leggi i termini di cancellazione completi dell'host, che si applicano anche in caso di malattia o disagi legati alla pandemia di COVID-19.
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <ModaleMessage v-if="showModal" @isShow="toggleModal" :annId="announcmentId"/>
    </div>

</template>

<script>
import ModaleMessage from '../partials/ModaleMessage.vue'
import MapAnnDetails from '../partials/MapAnnDetails.vue'
export default {
    name: "HouseComp",
    components: { ModaleMessage, MapAnnDetails },
    data() {
        return {
            showModal: false,
            announcmentId: null,
            apiUrl: '/api/announcements/appartament-details/',
            apartamentDetails: {},
            userDetails: {}
        }
    },
    methods: {
        getApi(){
            // console.log(this.$route.params.ann);
            axios.get(this.apiUrl + this.$route.params.ann)
            .then(response => {
                this.apartamentDetails = response.data.announcement[0];
                this.userDetails = response.data.user[0];
                this.announcmentId = response.data.announcement[0].id;
                // console.log(this.apartamentDetails);
                // console.log(this.userDetails);
            })
        },
        getModal(){
            this.showModal = !this.showModal
        },
        toggleModal(){
            this.showModal = false;
        },
        getImage(img){
            return  /storage/ + img;
        }
    },
    mounted(){
        this.getApi();
    }
};
</script>

<style lang="scss" scoped>

ul, li {
   text-decoration: none;
   list-style: none;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: bolder;
}

a {
    text-decoration: none;
    color: #F38375;
}

i {
    color: #EF6351;
    padding-right: 3px;
}

.coral-text {
    color: #EF6351;
}
.gray-text {
    color: gray;
}

.bg-coral1 {
    background-color: #EF6351;
}

.btn:hover {
    background-color: #F7A399;
}

.btn-sm:hover {
    color: white
}

.spacebar {
    border-bottom: 1px solid rgb(192, 192, 192);
    margin-top: 5px;
    margin-bottom: 5px;
}

.slot-img {
    border-radius: 15px;
}

.image-house {
    width:100%;
    max-height:100%;
    border-radius: 15px;
    box-shadow: 0px 5px 15px rgb(66, 66, 66);

}

.show-location {
    background: linear-gradient(to right, #EF6351, #F38375, #F7A399);
    color: white;
    width: 350px;
    flex-shrink: 0;
    transition: ease-out 0.5s;
    outline: none;
    cursor: pointer;

    &:hover {
        box-shadow: inset 350px 0 0 0 #EF6351;
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
        color: white;

    }
}

</style>
