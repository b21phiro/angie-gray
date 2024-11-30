<script setup>
  import { RouterView } from 'vue-router';
  import Header from './components/Header.vue';
  import Footer from "@/components/Footer.vue";
</script>

<template>
  <div class="app">
    <Header />
    <RouterView />
    <Footer />
  </div>
</template>

<style>
  .app {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }
</style>