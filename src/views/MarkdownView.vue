<script setup>

import {onMounted, ref} from "vue";
import Markdown from "@/models/Markdown.js";

const content = ref({});

  onMounted(async () => {
    const model = await Markdown.get();
    content.value = await model.getContentHtml();
  });

</script>

<template>
  <div class="content" v-html="content"></div>
</template>

<style scoped>
  .content {
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
    padding: 1rem;
  }
</style>