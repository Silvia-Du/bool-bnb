<template>
  <div>
    <HeaderComp />
    <main>
        <router-view></router-view>
    </main>
    <FooterComp />
  </div>
</template>

<script>

import HeaderComp from './components/partials/HeaderComp.vue';
import FooterComp from './components/partials/FooterComp.vue';

export default {
    name: 'App',
     components:{
        HeaderComp,
        FooterComp
    },

    data() {
        return {
            apiUrl: 'api/announcements',
        }
    },

    methods: {
        getAnnouncement(){
            axios.get(this.apiUrl)
            .then(response =>{
                console.log(response);
                // this.announcements = response.data.announcements;
            })
        }
    },


    mounted(){
        this.getAnnouncement();
    }


}
</script>

<style>

main{
    height: calc(100vh - 160px);
}

</style>
