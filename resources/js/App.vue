<template>
  <div>
    <TheHeader />
  </div>
</template>


<script>
import TheHeader from "./layouts/TheHeader.vue";  
import HomeView from './components/HomeView.vue';

export default {
  components: { TheHeader, HomeView },
};
</script>

<style>
</style>