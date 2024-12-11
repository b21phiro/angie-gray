<script setup>
  import SendSvgWhite from '@/assets/images/svg/send-white.svg';
  import LoaderSvgWhite from '@/assets/images/svg/loader-white.svg';

  import Email from "@/components/inputs/Email.vue";
  import Name from "@/components/inputs/Name.vue";
  import Text from "@/components/inputs/Text.vue";
  import {ref} from "vue";

  const form = ref({});
  const loading = ref(false);

  const email = ref({});
  const name = ref({});
  const message = ref({});

  async function send(formData) {
    return new Promise(resolve => {
      setTimeout(() => {
        resolve("Sent!");
      }, 1000);
    });

  }

  async function submit(ev) {
    ev.preventDefault();

    const { error: invalidEmail } = email.value;
    const { error: invalidName } = name.value;
    const { error: invalidMessage } = message.value;

    if (invalidEmail || invalidName || invalidMessage) {
      return;
    }

    loading.value = true;

    const result = await send();

    loading.value = false;

    alert(result);

  }

</script>

<template>

  <div class="contact">

    <section class="form--section">
      <h1>Get in touch</h1>
      <p>You can contact me via email. I will respond as soon as possible!</p>
    </section>

    <form :class="`${(loading) ? 'loading' : ''} form`" ref="form" @submit="submit" method="POST">

      <fieldset class="form--fieldset" aria-label="Email">
        <Name ref="name" :disabled="loading" />
        <Email ref="email" :disabled="loading" />
        <Text ref="message" :disabled="loading" />
      </fieldset>

      <label class="form--submit">
        <span v-if="loading">Sending email</span>
        <span v-else>Send email</span>
        <img v-if="loading" class="loading form--submit--icon" :src="LoaderSvgWhite" alt="Loading" />
        <img v-else class="form--submit--icon" :src="SendSvgWhite" alt="Send" />
        <input class="form--submit--value" type="submit" value="Send email" name="submit" title="Send email"/>
      </label>

    </form>

  </div>

</template>

<style scoped>

  .contact {
    padding: 2rem clamp(1rem, 4.5vw, 2rem);
    max-width: 46rem;
    width: 100%;
    margin-inline: auto;
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
  }

  .form {
    display: flex;
    flex-direction: column;
    gap: clamp(1rem, 4.5vw, 2rem);
  }

  .form--fieldset {
    border: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 2rem;
    transition: opacity 200ms ease-in-out;
  }

  .loading .form--fieldset {
    opacity: .5;
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
    width: 12rem;
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

  .loading.form--submit--icon {
    animation-name: loading;
    animation-duration: 1s;
    animation-iteration-count: infinite;
    animation-fill-mode: forwards;
    animation-timing-function: linear;
  }

  @keyframes loading {
    from { transform: rotate(0deg); }
    to { transform: rotate(180deg); }
  }

</style>