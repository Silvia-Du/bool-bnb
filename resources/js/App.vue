<template>
  <div>
    <HeaderComp />
    <main>
        home main
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
    }
}
</script>

<style>

main{
    height: calc(100vh - 160px);
}

</style>
