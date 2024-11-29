<script setup>
  import MenuFeatherSvg from '@/assets/menu.svg';
</script>

<template>
  <header class="app-header">
    <a class="logotype" href="/" title="Angie Gray">Angie Gray</a>
    <button class="menu-button" type="button" title="Open menu">
      <img :src="MenuFeatherSvg" alt="Menu" />
    </button>
  </header>
</template>

<style scoped>
  .app-header {
    padding: 2rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .logotype {
    font-size: 1.5rem;
    display: inline-flex;
    min-height: 3rem;
    align-items: center;
    justify-content: center;
    color: var(--dark-brown);
    text-decoration: none;
  }
</style>