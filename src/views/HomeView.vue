<script setup>

  import {onMounted, ref} from "vue";
  import Photography from "@/models/Photography.js";

  const photographs = ref([]);
  const carousel = ref({});

  function onScroll(ev) {
    carousel.value.scrollLeft += ev.deltaY;
  }

  onMounted(async() => {
    photographs.value = await Photography.getAll();
  });

</script>

<template>
  <section class="carousel">
    <ul ref="carousel" @wheel="onScroll" class="carousel--ul">
      <li class="carousel--ul--li" v-for="photograph in photographs" :key="photograph.id">
        <picture class="carousel--ul--li--figure" :style="`aspect-ratio:${ photograph.photos[0].aspect() };`">
          <router-link class="carousel--ul--li--figure--link" :to="'/photography/'+photograph.getDocumentId()" title="See photograph"></router-link>
          <source :srcset="photograph.photos[0].images.get('thumbnail').src"
                  :media="`(max-width: ${photograph.photos[0].images.get('thumbnail').width}px)`"
          />
          <source :srcset="photograph.photos[0].images.get('small').src"
                  :media="`(max-width: ${photograph.photos[0].images.get('small').width}px)`"
          />
          <source :srcset="photograph.photos[0].images.get('medium').src"
                  :media="`(max-width: ${photograph.photos[0].images.get('medium').width}px)`"
          />
          <source :srcset="photograph.photos[0].images.get('large').src"
                  :media="`(max-width: ${photograph.photos[0].images.get('large').width}px)`"
          />
          <img class="carousel--ul--li--figure--img"
               :src="photograph.photos[0].images.get('original').src"
               :alt="photograph.photos[0].images.get('original').alt" />
        </picture>
      </li>
    </ul>
  </section>
</template>

<style scoped>

  .carousel {
    width: 100vw;
    margin: auto;
  }

  .carousel--ul {
    display: flex;
    gap: 1rem;
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    padding: 0 1rem;
  }

  .carousel--ul--li {
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .carousel--ul--li--figure {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  .carousel--ul--li--figure--img {
    max-width: 100vw;
    min-height: 48vh;
    max-height: 56vh;
    height: 100%;
    object-fit: contain;
    object-position: center center;
  }

  .carousel--ul--li--figure:hover .carousel--ul--li--figure--img,
  .carousel--ul--li--figure:focus-within .carousel--ul--li--figure--img {
    transform: scale(1.15);
  }

  .carousel--ul--li--figure--link {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

</style>