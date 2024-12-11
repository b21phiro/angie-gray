<script setup>
  import './input.css';
  import { ref } from "vue";

  const firstTime = ref(true);
  const error = ref(true);
  const input = ref();

  function validate() {
    const { value } = input.value;
    error.value = !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i.test(value);
  }

  function onInput() {
    firstTime.value = false;
    if (error.value) { validate(); }
  }

  defineExpose({
    error
  });

  defineProps({
    disabled: {
      type: Boolean,
      default: false,
    }
  });

</script>

<template>
  <div :class="`${(error && !firstTime) ? 'error' : ''} input`">
    <label class="input--label" for="email">Your email</label>
    <input ref="input"
           @blur="validate"
           @input="onInput"
           class="input--value"
           id="email"
           type="text"
           name="email"
           :disabled="disabled"
    />
    <label v-if="error && !firstTime" :class="`error input--label--small`" for="email">
      Enter a valid email address.
    </label>
  </div>
</template>