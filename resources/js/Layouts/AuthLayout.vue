<script>
import NavLink from '@/Components/NavLink.vue';

const bgColorClasses = {
  'gray': 'bg-gray-200',
  'light-gray': 'bg-gray-50',
};

export default {
  components: {
    NavLink,
  },
  props: {
    bgColor: {
      type: String,
      default: 'gray',
    },
    navAtTheBottom: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    bgColorClass() {
      return bgColorClasses[this.bgColor];
    },
  },
  mounted() {
    if (this.navAtTheBottom) {
      this.$refs.root.appendChild(this.$refs.navbar);
    }
  },
};
</script>

<template>
  <div ref="root" class="flex min-h-screen flex-col" :class="bgColorClass">
    <nav ref="navbar" class="flex bg-gray-50">
      <NavLink value="home" icon="fa-solid fa-house">Home</NavLink>

      <NavLink value="search" icon="fa-solid fa-magnifying-glass"
        >Search</NavLink
      >

      <NavLink value="notifications" icon="fa-solid fa-bell"
        >Notifications</NavLink
      >

      <NavLink :href="$route('menu')" value="more" icon="fa-solid fa-bars"
        >More</NavLink
      >
    </nav>

    <main class="flex-1">
      <slot></slot>
    </main>
  </div>
</template>
