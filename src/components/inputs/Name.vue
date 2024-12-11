<script setup>

  import './input.css';
  import { ref } from "vue";

  const firstTime = ref(true);
  const error = ref(true);
  const input = ref();

  function validate() {
    const { value } = input.value;
    error.value = value.length < 1;
  }

  function onInput() {
    if (error.value && !firstTime.value) { validate(); }
  }

  defineExpose({ error });

</script>

<template>
  <div :class="`${(error && !firstTime) ? 'error' : ''} input`">
    <label class="input--label" for="name">Your name</label>
    <input @input="onInput" @blur="validate" ref="input" class="input--value" id="name" type="text" name="name" />
    <label v-if="error && !firstTime" :class="`error input--label--small`" for="name">
      Please enter your name.
    </label>
  </div>
</template>