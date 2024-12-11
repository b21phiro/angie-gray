<script setup>
  import SendSvgWhite from '@/assets/images/svg/send-white.svg';
  import Email from "@/components/inputs/Email.vue";
  import Name from "@/components/inputs/Name.vue";
  import Text from "@/components/inputs/Text.vue";
  import {ref} from "vue";

  const form = ref({});

  const email = ref({});
  const name = ref({});
  const message = ref({});

  async function submit(ev) {
    ev.preventDefault();

    const { error: invalidEmail } = email.value;
    const { error: invalidName } = name.value;
    const { error: invalidMessage } = message.value;

    if (invalidEmail || invalidName || invalidMessage) {
      return;
    }

    alert("Submit!");

  }

</script>

<template>
  <form ref="form" @submit="submit" class="form" method="POST">

    <section class="form--section">
      <h1>Get in touch</h1>
      <p>You can contact me via email. I will respond as soon as possible!</p>
    </section>

    <fieldset class="form--fieldset" aria-label="Email">
      <Name ref="name" />
      <Email ref="email" />
      <Text ref="message" />
    </fieldset>

    <label class="form--submit">
      <span>Send email</span>
      <img class="form--submit--icon" :src="SendSvgWhite" alt="Send" />
      <input class="form--submit--value" type="submit" value="Send email" name="submit" title="Send email"/>
    </label>

  </form>
</template>

<style scoped>

  .form {
    padding: 2rem 1rem;
    max-width: 46rem;
    width: 100%;
    margin-inline: auto;
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  .form--fieldset {
    border: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  .form--section {
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
  }

  .form--submit {
    background-color: var(--dark-brown);
    color: var(--white);
    font-size: 1rem;
    height: 3rem;
    padding-inline: 2rem;
    width: fit-content;
    border-radius: 100px;
    border: 0;
    cursor: pointer;
    transition: 150ms linear background-color;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
  }

  .form--submit:hover,
  .form--submit:focus {
    background-color: var(--black);
  }

  .form--submit--value {
    display: none;
  }

  .form--submit--icon {
    width: 1rem;
    height: 1rem;
  }

</style>