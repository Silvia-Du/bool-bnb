<template>
  <div>
    <HeaderComp @mandoInput="mandoInput" />
    <main>
      <router-view :input="input"></router-view>
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
          input: null
        }
    },
    methods:{
      mandoInput(data){
        this.input = data
      }
    }

}
</script>

<style>



</style>
