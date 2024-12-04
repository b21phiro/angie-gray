<script setup>

  import {ref} from "vue";

  const props = defineProps({
    images: Array
  });

  const carousel = ref(null);

  function onScroll(ev) {
    carousel.value.scrollLeft += ev.deltaY;
  }

</script>

<template>
  <section ref="carousel" class="carousel" @wheel="onScroll">
    <ul class="carousel--list">
      <li v-for="image in images" :key="image.id">
        <figure class="carousel--list--item--figure">
          <img class="carousel--list--item--figure--image" :src="image" alt="Example 1" />
        </figure>
      </li>
    </ul>
  </section>
</template>

<style scoped>

.carousel {
  width: 100vw;
  overflow-x: auto;
  overflow-y: hidden;
  padding-inline: 1rem;
  display: flex;
  margin: auto;
}

.carousel--list {
  display: flex;
  gap: 1rem;
  list-style: none;
  padding: 0;
}

.carousel--list--item--figure--image {
  display: block;
  height: 58vh;
}

</style>