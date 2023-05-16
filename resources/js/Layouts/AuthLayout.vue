<script>
import HeaderNavButton from '@/Components/HeaderNavButton.vue';

export default {
  components: {
    HeaderNavButton,
  },
};
</script>

<template>
  <div class="flex min-h-screen flex-col bg-gray-200">
    <header class="bg-gray-50">
      <nav class="flex justify-around">
        <HeaderNavButton value="home" icon="fa-solid fa-house"
          >Home</HeaderNavButton
        >

        <HeaderNavButton value="search" icon="fa-solid fa-magnifying-glass"
          >Search</HeaderNavButton
        >

        <HeaderNavButton value="notifications" icon="fa-solid fa-bell"
          >Notifications</HeaderNavButton
        >

        <HeaderNavButton value="more" icon="fa-solid fa-bars"
          >More</HeaderNavButton
        >
      </nav>
    </header>

    <main class="flex-1">
      <slot></slot>
    </main>
  </div>
</template>
