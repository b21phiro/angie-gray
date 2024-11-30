<script setup>
  import MailSvg from "@/assets/images/svg/mail.svg";
  import InstagramSvg from "@/assets/images/svg/instagram.svg";
  import FacebookSvg from "@/assets/images/svg/facebook.svg";
  import LinkedinSvg from "@/assets/images/svg/linkedin.svg";

  const socialmedia = [
    {
      name: "Facebook",
      title: "Visit my Facebook",
      href: "https://www.facebook.com",
      icon: FacebookSvg
    },
    {
      name: "Linkedin",
      title: "Follow my Linkedin",
      href: "https://www.facebook.com",
      icon: LinkedinSvg
    },
    {
      name: "Instagram",
      title: "Follow my Instagram",
      href: "https://www.facebook.com",
      icon: InstagramSvg
    }
  ];

</script>

<template>
  <footer class="app--footer">
    <nav class="social-media--items">
      <a class="social-media--button" v-for="item in socialmedia"
         :href="item.href"
         :title="item.title">
        <img class="social-media--button--icon" :src="item.icon" :alt="item.name">
      </a>
    </nav>
    <address>
      <a class="contact-link" href="mailto:example@outlook.com">
        <img class="contact-link--icon" :src="MailSvg" alt="Mail" />
        example@outlook.com
      </a>
    </address>
  </footer>
</template>

<style scoped>
  .app--footer {
    padding: 2rem 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2rem;
  }

  .contact-link--icon {
    width: .875rem;
    height: .875rem;
  }

  .contact-link {
    display: inline-flex;
    align-items: center;
    gap: .5em;
    font-size: .875rem;
    color: var(--dark-brown);
    font-family: var(--font-main-italic), sans-serif;
    text-decoration: none;
    opacity: .72;
    transition: opacity 150ms linear;
  }

  .contact-link:hover,
  .contact-link:focus {
    opacity: 1;
    text-decoration: underline;
  }

  .social-media--items {
    display: inline-flex;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .social-media--button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2rem;
    height: 2rem;
    border-radius: 100%;
    border: .0625rem solid var(--dark-brown);
    opacity: .72;
    transition: opacity 150ms linear;
  }

  .social-media--button:hover,
  .social-media--button:focus {
    opacity: 1;
  }

  .social-media--button--icon {
    width: 1rem;
    height: 1rem;
  }

</style>