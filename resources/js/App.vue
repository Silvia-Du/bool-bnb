<template>
<<<<<<< HEAD
=======
  <div >
    <HeaderComp />
    <main >
>>>>>>> b8362f7a32add5c34c9845b076d536f4d7763840

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
