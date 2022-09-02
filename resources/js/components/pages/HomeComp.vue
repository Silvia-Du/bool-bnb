<template>
<div class="home">
    <!-- jumbotron -->
    <div class="jumbotron debug py-0 px-lg-5 mb-0 d-none d-md-block">
      <div class="debug h-100 mx-5"></div>
    </div>

    <!-- row filter -->
    <div class="filter-row debug px-lg-5 py-4" @click="showDropD = !showDropD">
        <div class="row mx-lg-5">
            <div class="col-10 debug d-flex justify-content-around align-items-center">
                <div v-for="(category, i) in categories" :key="`category${i}`"
                class="categories debug text-center d-flex flex-column">
                <i class="fa-brands fa-fort-awesome debug "></i>
                {{ category }}
                </div>
                <i class="fa-solid fa-circle-chevron-right"></i>
            </div>
            <div class="col-2 debug filter align-items-center px-4 d-none d-md-flex">
                <i class="fa-solid fa-sliders mr-5"></i>
                <span class="ml-4">Filtri</span>
            </div>
        </div>
    </div>

    <!-- in evidence row -->
    <div class="debug sponsorized-row px-lg-5 container-fluid pt-md-5">
        <div class="row debug d-flex mx-lg-5 flex-wrap justify-content-around align-items-baseline pt-5 px-sm-2">
            <CardComp v-for="(announcement, i) in announcments" :key="`ann${i}`" :announcementItem = "announcement" />
            <h2 class="d-none d-md-block">Selezionati per te</h2>
        </div>
    </div>
    <ModaleFilter />
</div>

</template>

<script>
import ModaleFilter from '../pages/ModaleFilter.vue';
import CardComp from '../partials/CardComp.vue';
export default {
    name: 'HomeComp',
    components:{
        CardComp,
        ModaleFilter
    },


    data() {
        return {
            // devono avere l'icona (stringe) e l'active (true/false)
            categories : ['baite', 'campagna', 'wow', 'spiaggia', 'minicase', 'camper', 'design', 'b&b', 'luxe', 'ville', 'spazi creativi', 'co-working', 'co-leaving' ],

            apiUrl: 'api/announcements',
            announcments: null,
            showDropD: true
        }
    },

     methods: {
        getAnnouncement(){
            axios.get(this.apiUrl)
            .then(response =>{
                this.announcments = response.data.data;
                console.log(this.announcments);
            })
        }
    },

    mounted(){
        this.getAnnouncement();
    }


}
</script>

<style lang="scss" scoped>
.home{
    position: relative;
    .jumbotron{
        height: 500px;
    }
    .filter-row{
        overflow-x: auto;
        i{
            font-size: 1.7rem;
        }
        .categories{
            width: 85px;
            height: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            flex-shrink: 0;


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


</style>
