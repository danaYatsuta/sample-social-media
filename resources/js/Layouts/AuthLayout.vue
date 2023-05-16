<script>
import HeaderNavLink from '@/Components/HeaderNavLink.vue';

export default {
  components: {
    HeaderNavLink,
  },
};
</script>

<template>
  <div class="flex min-h-screen flex-col bg-gray-200">
    <header class="bg-gray-50">
      <nav class="flex justify-around">
        <HeaderNavLink value="home" icon="fa-solid fa-house"
          >Home</HeaderNavLink
        >

        <HeaderNavLink value="search" icon="fa-solid fa-magnifying-glass"
          >Search</HeaderNavLink
        >

        <HeaderNavLink value="notifications" icon="fa-solid fa-bell"
          >Notifications</HeaderNavLink
        >

        <HeaderNavLink value="more" icon="fa-solid fa-bars"
          >More</HeaderNavLink
        >
      </nav>
    </header>

    <main class="flex-1">
      <slot></slot>
    </main>
  </div>
</template>
