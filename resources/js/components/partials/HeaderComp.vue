<template>
  <header class="debug">
    <li><router-link :to="{name: 'home'}">Home</router-link></li>
  </header>
</template>

<script>
export default {
 name: 'HeaderComp'
}
</script>

<style lang="scss" scoped>

header{
    height: 80px;
}

</style>
