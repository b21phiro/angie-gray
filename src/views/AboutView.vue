<script setup>

import {onMounted, ref} from "vue";
import Biography from "@/models/Biography.js";

  const title = ref("");
  const content = ref();

  onMounted( async() => {
    const model = await Biography.get();
    title.value = model.title;
    content.value = await model.getContentHtml();
  });

</script>

<template>
  <section class="biography">
    <h1>{{ title }}</h1>
    <article class="biography--content" v-html="content"></article>
  </section>
</template>

<style>
  .biography {
    padding: 1rem;
    max-width: 46rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
    margin: 0 auto;
  }

  .biography--content {
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
  }

</style>