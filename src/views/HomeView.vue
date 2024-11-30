<script setup>
  import Image1 from '@/assets/images/example-1.jpg';
  import Image2 from '@/assets/images/example-2.jpg';
  import Image3 from '@/assets/images/example-3.jpg';
  import Image4 from '@/assets/images/example-4.jpg';
  import Image5 from '@/assets/images/example-5.jpg';
  import Image6 from '@/assets/images/example-6.jpg';
  import Image7 from '@/assets/images/example-7.jpg';
  import Image8 from '@/assets/images/example-8.jpg';

  import {onMounted, ref} from "vue";

  const images = ref([]);

  onMounted(() => {
    setTimeout(() => {
      images.value.push(Image1);
      images.value.push(Image2);
      images.value.push(Image3);
      images.value.push(Image4);
      images.value.push(Image5);
      images.value.push(Image6);
      images.value.push(Image7);
      images.value.push(Image8);
    }, 33);
  });

</script>

<template>
  <main class="app--main">
    <section class="carousel">
      <ul class="carousel--list">
        <li v-for="image in images" :key="image.id">
          <figure class="carousel--list--item--figure">
            <img class="carousel--list--item--figure--image" :src="image" alt="Example 1" />
          </figure>
        </li>
      </ul>
    </section>
  </main>
</template>

<style>

  .app--main {
    display: flex;
    flex-direction: column;
    flex: 1;
  }

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