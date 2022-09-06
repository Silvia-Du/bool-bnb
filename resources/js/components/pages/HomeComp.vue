<template>
<div class="home">
    <!-- jumbotron -->
    <div class="jumbotron debug py-0 px-lg-5 mb-0 d-none d-md-block">
      <div class="debug h-100 mx-5"></div>
    </div>
    <!-- new-row -->
    <div class=" debug py-4 px-lg-5 container-fluid">
        <div class="row debug mx-lg-5 new-row-filter">
            <div class="d-none d-lg-flex col-2 debug">
                <p>cosa cerchi?</p>
            </div>
            <div class="col-12 col-lg-10 offset-lg-2 debug d-flex justify-content-around align-items-center">

                <div @click="getCategory(i, category)"
                v-for="(category, i) in categories" :key="`category${i}`"
                class="categories debug d-flex flex-column pt-1 justify-content-center align-items-center" :class="{'active': i === isActive}">
                    <i class="fa-brands fa-fort-awesome debug mb-1"></i>
                    <p class="mb-0 category">{{ category }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- row filter -->
    <div class="d-none d-md-block filter-row debug px-lg-5 py-4">
        <div class="row mx-lg-5 ">

            <div class=" col-1 debug filter align-items-center px-4 d-none d-md-flex ">

                <span class="ml-4">Cosa stai cercando?</span>
            </div>
            <div class="col-11 debug d-flex justify-content-around align-items-center">

                <div @click="getCategory(i, category)"
                v-for="(category, i) in categories" :key="`category${i}`"
                class="categories debug d-flex flex-column pt-1 justify-content-center align-items-center" :class="{'active': i === isActive}">
                    <i class="fa-brands fa-fort-awesome debug mb-1"></i>
                    <p class="mb-0 category">{{ category }}</p>
                </div>
            </div>

        </div>
    </div>

    <!-- in evidence row -->
    <div class="debug sponsorized-row px-lg-5 container-fluid pt-md-5">
        <div class="row debug d-flex mx-lg-5 flex-wrap justify-content-around pt-5 px-sm-2">

            <CardComp
            class=""
            v-for="(announcement, i) in announcments" :key="`ann${i}`" :announcementItem = "announcement" />
            <h2 class="d-none d-md-block">Selezionati per te</h2>
        </div>
    </div>
    <div class="no-results container-fluid py-md-5 debug">
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
            announcments: null,
            isActive: -1,
            selectedCat: '',
        }
    },

     methods: {
        getAnnouncement(){
            axios.get(this.announcApiUrl)
            .then(response =>{
                this.announcments = response.data.data;
            })
        },

        getCategory(index, category){
            this.isActive = index;
            this.selectedCat = category;
            axios.get(this.announcApiUrl + '/category/' + this.selectedCat)
            .then(response => {
                this.announcments = response.data;
            })
        },

    },





    mounted(){
        this.getAnnouncement();
    }


}
</script>

<style lang="scss" scoped>

    .new-row-filter{
        .col-12{

            overflow-x: auto;
            .categories{
            width: 95px;
            min-height: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            flex-shrink: 0;
            border-bottom: 3px solid white;
            &:hover{
                border-bottom: 3px solid black;
            }
            &.active{
                border-bottom: 3px solid black;
            }


        }
        }
    }

.home{
    .jumbotron{
        height: 500px;
    }
    .filter-row{

        overflow-x: auto;
        i{
            font-size: 1.7rem;
        }
        .categories{
            width: 95px;
            min-height: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            flex-shrink: 0;
            border-bottom: 3px solid white;
            &:hover{
                border-bottom: 3px solid black;
            }
            &.active{
                border-bottom: 3px solid black;
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
        position: relative;
        h2{
            z-index: 2;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translate(-50%);
            font-size: 4rem;
            opacity: 80%;
        }
    }
}

// per scroll
/* width */
// ::-webkit-scrollbar {
//   width: 5px;
//   height: 7px;
// }

// /* Track */
// ::-webkit-scrollbar-track {
//   box-shadow: inset 0 0 5px grey;
//   border-radius: 10px;
// }

// /* Handle */
// ::-webkit-scrollbar-thumb {
//   background: $redColor;
//   border-radius: 10px;
// }

// /* Handle on hover */
// ::-webkit-scrollbar-thumb:hover {
//   background: $redColor;
// }


</style>
