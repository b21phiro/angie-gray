<script setup>
  import './input.css';

  import './input.css';
  import { ref } from "vue";

  const firstTime = ref(true);
  const error = ref(true);
  const errorMessage = ref("Bad input!");
  const input = ref();

  function validate() {
    const { value } = input.value;
    const restrictions = { min: 9, max: 1000 };
    if (value.length < 1) {
      error.value = true;
      errorMessage.value = "Please write your message.";
    } else if (value.length >= 1 && value.length < restrictions.min) {
      error.value = true;
      errorMessage.value = "Your message is too short.";
    } else if (value.length >= restrictions.max) {
      error.value = true;
      errorMessage.value = "Your message is too long.";
    } else {
      error.value = false;
    }
  }

  function onInput() {
    firstTime.value = false;
    if (error.value && !firstTime.value) { validate(); }
  }

  defineExpose({ error });

</script>

<template>
  <div :class="`${(error && !firstTime) ? 'error' : ''} input`">
    <label class="input--label" for="message">Your message</label>
    <textarea @input="onInput"
              @blur="validate"
              ref="input" class="input--value" id="message" name="message" rows="5"></textarea>
    <label v-if="error && !firstTime" :class="`error input--label--small`" for="message">
      {{ errorMessage }}
    </label>
  </div>
</template>