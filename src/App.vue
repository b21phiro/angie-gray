<script setup>
  import { RouterView } from 'vue-router';
  import Header from './components/Header.vue';
</script>

<template>
  <div class="app">
    <Header />
    <RouterView />
  </div>
</template>

<style>
  .app {

    width: 100%;

    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: auto 1fr auto;
    gap: 2rem;
  }
</style>