<script>
import AppCard from '@/Components/AppCard.vue';
import ProfileMenuButton from '@/Components/ProfileMenuButton.vue';

export default {
  components: {
    AppCard,
    ProfileMenuButton,
  },
  data() {
    return {
      user: {
        name: 'Cool Crow',
        avatarImage: '/images/avatar-demo.png',
        coverImage: '/images/cover-demo.png',
        bio: 'tfw best crow',
        city: 'Saint Petersburg',
      },
      isMenuOpen: false,
    };
  },
};
</script>

<!-- eslint-disable max-len -->
<template>
  <main class="min-h-screen bg-gray-200 text-sm">
    <div class="relative">
      <img :src="user.coverImage" :alt="`${user.name}'s cover image`" />

      <button
        @click="isMenuOpen = !isMenuOpen"
        class="absolute right-1 top-2 aspect-square h-9 rounded-full bg-gray-600/75"
      >
        <i class="fa-solid fa-xl fa-ellipsis text-white"></i>
      </button>

      <Transition enter-from-class="opacity-0" leave-to-class="opacity-0">
        <div
          v-if="isMenuOpen"
          class="absolute right-1 top-14 z-10 flex flex-col items-start gap-8 rounded-lg bg-white p-4 shadow-md transition-opacity motion-reduce:transition-none"
        >
          <ProfileMenuButton icon="fa-solid fa-user"
            >Edit profile</ProfileMenuButton
          >
          <ProfileMenuButton icon="fa-solid fa-pencil"
            >Edit cover</ProfileMenuButton
          >
          <ProfileMenuButton icon="fa-solid fa-copy"
            >Copy link</ProfileMenuButton
          >
        </div>
      </Transition>
    </div>

    <div class="relative bottom-3">
      <AppCard class="relative flex flex-col items-center gap-2">
        <img
          :src="user.avatarImage"
          :alt="`${user.name}'s avatar image'`"
          class="absolute top-0 aspect-square h-24 -translate-y-1/2 rounded-full border-4 border-white"
        />

        <p class="mt-10 text-2xl font-bold">{{ user.name }}</p>
        <p>{{ user.bio }}</p>
        <p class="flex gap-4 text-gray-400">
          <span
            ><i class="fa-solid fa-location-dot mr-2"></i>{{ user.city }}</span
          >
          <span><i class="fa-solid fa-circle-info mr-2"></i>Learn more</span>
        </p>
      </AppCard>
    </div>
  </main>
</template>