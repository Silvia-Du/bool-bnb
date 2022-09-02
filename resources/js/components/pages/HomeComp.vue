<template>
<div>

    <div class="jumbotron debug py-0 px-lg-5 mb-0 d-none d-md-block">

      <div class="debug h-100 mx-5">

      </div>
    </div>
    <div class="filter-row debug px-lg-5 py-4">
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
    <InEvidenceRow />
</div>
</template>

<script>

import InEvidenceRow from '../partials/InEvidenceRow.vue';
export default {
    name: 'HomeComp',
    components:{
        InEvidenceRow
    },

    data() {
        return {
            categories : ['baite', 'campagna', 'wow', 'spiaggia', 'minicase', 'camper', 'design', 'b&b', 'luxe', 'ville', 'spazi creativi', 'co-working', 'co-leaving' ]
            // devono avere l'icona (stringe) e l'active (true/false)
        }
    },
}
</script>

<style lang="scss" scoped>

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

</style>
