<script setup>
    import MenuFeatherSvg from '@/assets/images/svg/menu.svg';
    import XFeatherSvg from '@/assets/images/svg/x.svg';
    import ChevronRightLargeSvg from '@/assets/images/svg/chevron-right-large.svg';
    import {ref} from "vue";
    import { navigation } from "@/lib/Navigation.js";

    let mobileMenuIsOpen = ref(false);

    function toggleMobileMenu() {
      mobileMenuIsOpen.value = !mobileMenuIsOpen.value;
    }

    function closeMobileMenu() {
      mobileMenuIsOpen.value = false;
    }

</script>

<template>
  <header class="app-header">

    <a class="logotype" href="/" title="Angie Gray">Angie Gray</a>

    <nav class="desktop-navigation" aria-label="Navigation">
      <router-link
          class="desktop-navigation-item"
          v-for="nav in navigation"
          aria-label="Navigation item"
          :title="nav.title"
          :to="nav.to">
        {{ nav.text }}
      </router-link>
    </nav>

    <button @click="toggleMobileMenu" class="menu-button" type="button" title="Open menu">
      <img :src="MenuFeatherSvg" alt="Menu" />
      <span>Menu</span>
    </button>

    <div :class="(mobileMenuIsOpen) ? 'mobile-menu open' : 'mobile-menu'">

      <div class="mobile-menu--header">
        <button @click="closeMobileMenu" class="menu-button" type="button" title="Close menu">
          <img :src="XFeatherSvg" alt="Close" />
          <span>Close</span>
        </button>
      </div>

      <nav aria-label="Navigation" class="mobile-menu--nav">

        <router-link
            v-for="nav in navigation"
            @click="closeMobileMenu"
            class="mobile-menu--nav--link"
            :to="nav.to"
            :title="nav.title">
          <span>{{ nav.text }}</span>
          <img :src="ChevronRightLargeSvg" alt="Go to" />
        </router-link>

      </nav>

    </div>

  </header>
</template>

<style scoped>
  .app-header {
    position: relative;
    padding: 2rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: var(--site-max-width);
    margin-inline: auto;
    width: 100%;
  }

  .logotype {
    font-size: 1.5rem;
    display: inline-flex;
    min-height: 3rem;
    align-items: center;
    justify-content: center;
    color: var(--dark-brown);
    text-decoration: none;
    font-family: var(--font-secondary-bold), sans-serif;
  }

  .menu-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 5.32rem;
    min-height: 3rem;
    background-color: transparent;
    border: 0;
    gap: .5rem;
    font-size: 1rem;
    cursor: pointer;
    opacity: .72;
    color: var(--dark-brown);
    font-family: var(--font-main-bold), sans-serif;
  }

  /** Mobile menu */
  .mobile-menu {
    position: fixed;
    top: 0;
    right: -100%;
    background-color: var(--brown);
    width: 100%;
    height: 100%;
    z-index: 999;
    transition: transform 300ms linear;
  }

  .mobile-menu.open {
    transform: translateX(-100%);
    box-shadow: 0 0 1rem rgba(0,0,0,.08), .25rem .25rem 1rem rgba(0,0,0,.16);
  }

  .mobile-menu--header {
    width: 100%;
    padding: 2rem 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: end;
  }

  .mobile-menu--nav {
    display: flex;
    flex-direction: column;
    margin: 2rem 1rem;
    gap: 2rem;
    opacity: 0;
    transition: all 300ms linear;
    transition-delay: 300ms;
    transform: translateX(1rem);
  }

  .mobile-menu.open .mobile-menu--nav {
    opacity: 1;
    transform: translateX(0);
  }

  .mobile-menu--nav--link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 3rem;
    font-size: 2rem;
    color: var(--dark-brown);
    text-decoration: none;
    opacity: .72;
  }

  .mobile-menu--nav--link[aria-current="page"] {
    opacity: 1;
  }

  /** Desktop navigation */

  .desktop-navigation {
    display: none;
    gap: 1rem;
  }

  .desktop-navigation-item {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 3rem;
    color: var(--dark-brown);
    opacity: .72;
    text-decoration: none;
    width: 5.4rem;
    text-align: center;
  }

  /** Misc */

  .desktop-navigation-item:hover,
  .desktop-navigation-item:focus,
  .desktop-navigation-item[aria-current="page"],
  .menu-button:hover,
  .menu-button:focus-within {
    opacity: 1;
    transition: opacity 150ms linear;
  }

  /** Breakpoints */

  @media (min-width: 42rem) {
    .menu-button,
    .mobile-menu {
      display: none;
    }

    .desktop-navigation {
      display: inline-flex;
    }
  }

</style>