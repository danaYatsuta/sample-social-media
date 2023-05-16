<script>
import HeaderNavLink from '@/Components/HeaderNavLink.vue';

const bgColorClasses = {
  'gray': 'bg-gray-200',
  'light-gray': 'bg-gray-50',
};

export default {
  components: {
    HeaderNavLink,
  },
  props: {
    bgColor: {
      type: String,
      default: 'gray',
    },
  },
  computed: {
    bgColorClass() {
      return bgColorClasses[this.bgColor];
    },
  },
};
</script>

<template>
  <div class="flex min-h-screen flex-col" :class="bgColorClass">
    <header class="bg-gray-50">
      <nav class="flex justify-around">
        <HeaderNavLink
          :href="$route('menu')"
          value="home"
          icon="fa-solid fa-house"
          >Home</HeaderNavLink
        >

        <HeaderNavLink value="search" icon="fa-solid fa-magnifying-glass"
          >Search</HeaderNavLink
        >

        <HeaderNavLink value="notifications" icon="fa-solid fa-bell"
          >Notifications</HeaderNavLink
        >

        <HeaderNavLink value="more" icon="fa-solid fa-bars">More</HeaderNavLink>
      </nav>
    </header>

    <main class="flex-1">
      <slot></slot>
    </main>
  </div>
</template>
