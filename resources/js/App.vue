<template>
  <div>
    <HeaderComp :bgHeader="true" />
    <main @scroll="bgHeader()">

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

        }
    },

}
</script>

<style>



</style>
