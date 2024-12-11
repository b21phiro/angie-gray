<script setup>

  import {onMounted, ref} from "vue";
  import Photography from "@/models/Photography.js";
  import {useRoute} from "vue-router";

  const title = ref("");
  const photos = ref([]);
  const carousel = ref({});

  function onScroll(ev) {
    carousel.value.scrollLeft += ev.deltaY;
  }

  onMounted(async () => {
    const route = useRoute();
    const id = route.params.id;

    const model = await Photography.getById(id);
    title.value = model.title;
    photos.value = model.photos;
  });

</script>

<template>
  <section class="photography">
    <h1 class="photography--title">{{ title }}</h1>
    <figure class="photography--figure"
            v-for="photo of photos"
            :key="photo.id"
            :style="`aspect-ratio: ${photo.aspect()};`"
    >
      <img :src="photo.images.get('original').src"
           :alt="photo.images.get('original').alt"
           class="photography--figure--image"
      />
      <figcaption class="photography--figure--caption">
        {{ photo.description }}
      </figcaption>
    </figure>
  </section>
</template>

<style scoped>

  .photography {
    max-width: 64rem;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: clamp(2rem, 4.5vw, 4rem);
    padding: clamp(1rem, 4.5vw, 2rem);
  }

  .photography--title {
    text-align: center;
  }

  .photography--figure {
    width: 100%;
    max-height: 100vh;
    display: flex;
    flex-direction: column;
    gap: clamp(2rem, 4.5vw, 4rem);
  }

  .photography--figure--image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center center;
  }

  .photography--figure--caption {
    font-size: 1rem;
    text-align: center;
    max-width: 32rem;
    line-height: 1.7;
    margin: auto;
  }

</style>