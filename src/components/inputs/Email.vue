<script setup>
  import './input.css';
  import { ref } from "vue";

  const emailRegExp = new RegExp(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/);
  const error = ref(false);

  function onBlur(ev) {
    const { target: input } = ev;
    validate(input);
  }

  function validate(input) {
    error.value = !!emailRegExp.test(input.value);
    return error.value;
  }

  defineExpose({
    error,
    validate
  });

</script>

<template>
  <div class="input">
    <label class="input--label" for="email">Your email</label>
    <input @blur="onBlur"
           class="input--value"
           id="email"
           type="text"
           name="email"
    />
    <label v-if="!error" class="input--info" for="email">Enter a valid email address.</label>
  </div>
</template>