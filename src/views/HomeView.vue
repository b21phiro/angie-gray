<script setup>

  import {onMounted, ref} from "vue";
  import Carousel from "@/components/Carousel.vue";
  import Photography from "@/models/Photography.js";

  const images = ref([]);

  onMounted(async() => {
    const photos = await Photography.getAll();
    console.log(photos);
  });

</script>

<template>
  <Carousel :images=images />
</template>