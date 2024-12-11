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
    <h1 class="biography--title">{{ title }}</h1>
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

  .biography--title {
    font-size: clamp(2rem, 4.5vw, 3rem);
    line-height: 1.7;
  }

  .biography--content {
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
  }

  .biography--content p {
    font-size: 1rem;
    text-align: justify;
    line-height: 1.7;
  }

  .biography--content img {
    width: 100%;
    display: block;
    max-height: 100vh;
    object-fit: contain;
    object-position: center center;
  }

</style>