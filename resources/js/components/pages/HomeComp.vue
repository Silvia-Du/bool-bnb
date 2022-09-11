<template>
    <div class="home text-center">
        <!-- jumbotron -->
        <div class="jumbo container-fluid px-0 mx-0 py-0 mb-0 d-none d-md-block mb-1">
            <div class="row img h-100 d-flex align-items-center pl-4 lp-lg-0">
                <div class="col-8 col-xl-4 text mex offset-lg-1 d-flex flex-column mt-5 py-2">
                    <div class="py-4">
                        <a href="/"><img src="images\logo.png" class="my-4 logo-jumbo" /></a>
                        <h3>Il luogo perfetto per trovare la tua nuova casa!</h3>
                    </div>
                </div>
            </div>
        </div>
        <img src="images\selezionati-per-te.png" class="selected mt-5 mb-0 img-fluid" />
        <!-- <h2 class="d-none d-md-block selected mt-5 mb-0">Selezionati per te</h2> -->
        <!-- row filter -->
        <div class="d-none d-md-block filter-row px-lg-5 py-4 container-fluid">
            <div class="row mx-lg-5">
                <div class="col-categories col-12 px-5 d-flex justify-content-around align-items-center">
                    <div @click="getCategory(i, category)"
                    v-for="(category, i) in categories" :key="`category${i}`"
                    class="categories d-flex flex-column pt-1 justify-content-center align-items-center" :class="{'active': i === isActive}">
                        <i class="fa-solid fa-house my-2"></i>
                        <p class="mb-0 category">{{ category }}</p>
                    </div>
                </div>
            </div>
        </div>
           <!-- in evidence row -->
        <div class="sponsorized-row px-lg-5 container-fluid pt-md-5 text-center pt-5 pt-md-0">
            <!-- <h2 class="d-none d-md-block">Selezionati per te</h2> -->
            <div class="row d-flex mx-lg-5 flex-wrap justify-content-center pt-5 px-sm-2">
                <CardComp
                class=""
                v-for="(announcement, i) in announcements" :key="`ann${i}`" :announcementItem = "announcement" />
            </div>
        </div>
        <div v-if="announcements ===[]"
        class="no-results container-fluid py-md-5">
            <div class="debug row d-flex justify-content-center align-items-center py-3">
                <h2>Non ci sono risultati per questa ricerca</h2>
            </div>
        </div>
    </div>
    </template>
    <script>
    import CardComp from '../partials/CardComp.vue';
    export default {
        name: 'HomeComp',
        components:{
            CardComp,
        },
        data() {
            return {
                // devono avere l'icona (stringe) e l'active (true/false)
                categories : ['Baite', 'Campagna', 'Wow!', 'Minicase', 'Camper', 'Design', 'B&B', 'Luxe', 'Ville', 'Spazi creativi', 'Co-working', 'Co-leaving' ],
                announcApiUrl: 'api/announcements',
                announcements: null,
                isActive: -1,
                selectedCat: '',
            }
        },
         methods: {
            getAnnouncement(){
                axios.get(this.announcApiUrl)
                .then(response =>{
                    this.announcements = response.data.data;
                })
            },
            getCategory(index, category){
                this.isActive = index;
                this.selectedCat = category;
                axios.get(this.announcApiUrl + '/category/' + this.selectedCat)
                .then(response => {
                    this.announcements = response.data;
                })
            },

        },
        mounted(){
            this.getAnnouncement();
        }
    }
    </script>
    <style lang="scss" scoped>
    .home{
        h2.selected{
                font-size: 4rem;
            }
        .jumbo{
            height: 75vh;
            position: relative;
            overflow-x: hidden;
            background-image: url(../../../../public/img/jumbo-bg.png);
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;

            .logo-jumbo{
                max-width: 100%;
                height: auto;
            }

            .mex{
                background-color: rgba(44, 78, 78, 0.3);
                color: white;
                border-radius: 5px;
                background-color: rgba(50, 50, 50, 0.5);
                backdrop-filter: blur(10px);
                border-radius: 10px;
            }
            h1{
                font-size: 3rem;
                font-weight: bold;
            }
        }
        .filter-row{
            i{
                font-size: 1.7rem;
            }
            .col-categories{
                    max-width: 1500px;
                    margin: auto;
                    overflow-x: scroll;
                    padding: 35px 0px 40px 0;
                    &::-webkit-scrollbar {
                        z-index: 2;
                        height: 5px;
                    }
                    &::-webkit-scrollbar-track {
                        border-radius: 5px;
                    }
                    &::-webkit-scrollbar-thumb {
                        background: linear-gradient(to right,#F38375,#F7A399,#FBC3BC);
                        border-radius: 10px;
                    }
                .categories{
                    width: 100px;
                    height: 100px;
                    border-radius: 10px;
                    min-height: 50px;
                    font-size: 0.8rem;
                    font-weight: 600;
                    flex-shrink: 0;
                    transition: 0.5s;
                    &:hover{
                        backdrop-filter: blur(10px);
                        box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
                        transform: translateY(3px);
                        flex-shrink: 0;
                        transition: ease-out 0.5s;
                        outline: none;
                        color: #EF6351;
                        cursor: pointer;
                    }
                    &.active{
                        box-shadow: 0 10px 15px gray;
                        transform: translateY(-15px);
                        background-color: rgba(255, 255, 255, 0.3);
                        backdrop-filter: blur(10px);
                        color: #EF6351;
                    }
                }
            }
            .filter{
                border-radius: 15px;
                font-weight: bold;
                font-size: 1rem;
                flex-shrink: 0;
                i{
                    font-size: 1.4rem;
                }
            }
        }
        .sponsorized-row{
            background-color: #ede6e3;
        }
    }
    </style>
