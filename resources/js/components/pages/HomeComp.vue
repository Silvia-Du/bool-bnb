<template>
<div
class="home ">
    <!-- jumbotron -->
    <div class="jumbotron container-fluid px-0 mx-0 py-0 mb-0 d-none d-md-block">
      <div class="row img h-100 d-flex align-items-center">
        <div class="col-4 text debug offset-lg-1 d-flex flex-column mt-5">
            <h1>Il posto migliore dove sentirsi a casa!</h1>

            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ad nobis soluta nulla, eius voluptas error sapiente cumque totam consectetur?</h2>
        </div>
      </div>
    </div>

    <!-- row filter -->
    <div class="d-none d-md-block filter-row debug px-lg-5 py-4 container-fluid">
        <div class="row mx-lg-5 debug">

            <div class="col-categories col-12 px-5 debug d-flex justify-content-around align-items-center">
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
    <div class="sponsorized-row px-lg-5 container-fluid pt-md-5 text-center">
        <h2 class="d-none d-md-block">Selezionati per te</h2>
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
    .jumbotron{
        height: 650px;
        h1{
            font-size: 3rem;
            font-weight: bold;
        }
        .img{
            background-image: url(../../../../public/img/12.png);
            background-size: cover;
            background-position: center;
        }
    }
    .filter-row{
        i{
            font-size: 1.7rem;
        }

        .col-categories{
            //OVERFLOW
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
        h2{
            font-size: 4rem;
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
