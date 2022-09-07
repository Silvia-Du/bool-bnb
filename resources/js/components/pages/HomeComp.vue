<template>
    <div class="home text-center">
        <!-- jumbotron -->
        <div class="jumbo container-fluid px-0 mx-0 py-0 mb-0 d-none d-md-block mb-1">
            <div class="row img h-100 d-flex align-items-center pl-4 lp-lg-0">
                <div class="col-8 col-xl-4 text mex offset-lg-1 d-flex flex-column mt-5 py-2">
                    <h1>Il posto migliore dove sentirsi a casa!</h1>
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ad nobis soluta nulla, eius voluptas error sapiente cumque totam consectetur?</h2>
                </div>
            </div>
        </div>
        <h2 class="d-none d-md-block selected mt-5 mb-0">Selezionati per te</h2>
        <!-- row filter -->
        <div class="d-none d-md-block filter-row px-lg-5 py-4 container-fluid">
            <div class="row mx-lg-5">
                <div class="col-categories col-12 px-5 d-flex justify-content-around align-items-center">
                    <div @click="getCategory(i, category)"
                    v-for="(category, i) in categories" :key="`category${i}`"
                    class="categories d-flex flex-column pt-1 justify-content-center align-items-center" :class="{'active': i === isActive}">
                        <i class="fa-brands fa-fort-awesome mb-1"></i>
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
                categories : ['baite', 'campagna', 'wow', 'minicase', 'camper', 'design', 'b&b', 'luxe', 'ville', 'spazi creativi', 'co-working', 'co-leaving' ],
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
            background-image: url(../../../../public/img/4.png);
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;

            .mex{
                background-color: rgba(44, 78, 78, 0.3);
                color: white;
                border-radius: 5px;
            //     background-color: rgba(50, 50, 50, 0.5);
                backdrop-filter: blur(10px);
            //     border-radius: 20px;
            //     padding: 20px;
            //     background-image: url(https://wallpaperaccess.com/full/3150981.jpg);
            //     color: transparent;
            //     background-position: top;
            //     background-clip: text;
            //     // -webkit-background-clip: text;
            //     // -webkit-text-fill-color: transparent;
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
                    padding: 25px 0px 35px 0;
                    &::-webkit-scrollbar {
                        z-index: 2;
                        height: 5px;
                    }
                    &::-webkit-scrollbar-track {
                        border-radius: 5px;
                    }
                    &::-webkit-scrollbar-thumb {
                        background: linear-gradient(to top,#EF6351, #F38375,#F7A399 );
                        border-radius: 50%;
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
                        // background-color: rgba(68, 99, 117, 0.3);
                        backdrop-filter: blur(10px);
                        box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
                        // box-shadow: 0 10px 15px rgb(146, 146, 146);
                        transform: translateY(1px);
                        flex-shrink: 0;
                        transition: ease-out 0.5s;
                        outline: none;
                        color: #d8673a;
                        cursor: pointer;
                    }
                    &.active{
                        box-shadow: 0 10px 15px gray;
                        transform: translateY(-15px);
                        background-color: rgba(255, 255, 255, 0.3);
                        backdrop-filter: blur(10px);
                        color: black;
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
            background-color: #f0f0f0;

        }
    }

    </style>

