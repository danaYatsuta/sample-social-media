<script>
import AppCard from '@/Components/AppCard.vue';
import ProfileMenuButton from '@/Components/ProfileMenuButton.vue';
import DetailsItem from '@/Components/DetailsItem.vue';

export default {
  components: {
    AppCard,
    ProfileMenuButton,
    DetailsItem,
  },
  data() {
    return {
      user: {
        name: 'Cool Crow',
        nickname: 'coolcrow',
        avatarImage: '/images/avatar-demo.png',
        coverImage: '/images/cover-demo.png',
        bio: 'tfw best crow',
        city: 'Saint Petersburg',
        birthdate: new Date('2000-4-27'),
        followerCount: 92,
      },
      isMenuOpen: false,
      isDetailsOpen: false,
    };
  },
  computed: {
    formattedDate() {
      const month = this.user.birthdate.toLocaleString('default', {
        month: 'long',
      });
      return `${month} ${this.user.birthdate.getDate()}, ${this.user.birthdate.getFullYear()}`;
    },
    formattedFollowersCount() {
      if (this.user.followerCount === 1) {
        return '1 follower';
      }

      return `${this.user.followerCount} followers`;
    },
  },
};
</script>

<!-- eslint-disable max-len -->
<template>
  <main class="min-h-screen bg-gray-200">
    <div class="relative">
      <img :src="user.coverImage" :alt="`${user.name}'s cover image`" />

      <button
        @click="isMenuOpen = !isMenuOpen"
        class="absolute right-1 top-2 aspect-square h-9 rounded-full bg-gray-600/75"
      >
        <i class="fa-solid fa-xl fa-ellipsis text-white"></i>
      </button>

      <Transition enter-from-class="opacity-0" leave-to-class="opacity-0">
        <AppCard
          v-if="isMenuOpen"
          rounded-radius="xl"
          class="absolute right-1 top-14 z-10 flex flex-col items-start gap-8 shadow-md transition-opacity motion-reduce:transition-none"
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
        </AppCard>
      </Transition>
    </div>

    <div class="relative bottom-3">
      <AppCard class="relative flex flex-col items-center">
        <img
          :src="user.avatarImage"
          :alt="`${user.name}'s avatar image'`"
          class="absolute top-0 aspect-square h-24 -translate-y-1/2 rounded-full border-4 border-white"
        />

        <button
          @click="isDetailsOpen = true"
          class="mt-10 flex w-full flex-col items-center gap-2"
        >
          <p class="text-2xl font-bold">{{ user.name }}</p>
          <p>{{ user.bio }}</p>
          <p class="flex gap-4 text-gray-400">
            <span
              ><i class="fa-solid fa-location-dot mr-2"></i
              >{{ user.city }}</span
            >
            <span><i class="fa-solid fa-circle-info mr-2"></i>Learn more</span>
          </p>
        </button>
      </AppCard>
    </div>

    <Transition
      enter-from-class="bg-opacity-0 [&>*]:translate-y-full"
      leave-to-class="bg-opacity-0 [&>*]:translate-y-full"
    >
      <div
        v-if="isDetailsOpen"
        class="absolute inset-0 bg-black bg-opacity-25 transition-colors duration-500 motion-reduce:transition-none"
      >
        <AppCard
          rounded-radius="xl"
          rounded-sides="top"
          class="absolute inset-0 mt-4 transition-transform duration-500 motion-reduce:transition-none"
        >
          <div class="text-xl">
            <button @click="isDetailsOpen = false" class="mr-8">
              <i class="fa-xl fa-solid fa-xmark text-blue-500"></i></button
            ><span>Details</span>
          </div>
          <div class="mt-8 flex flex-col gap-2">
            <DetailsItem icon="fa-solid fa-align-left">{{
              user.bio
            }}</DetailsItem>
            <DetailsItem icon="fa-solid fa-at"
              ><a href="#" class="text-blue-500">{{
                user.nickname
              }}</a></DetailsItem
            >
            <hr class="my-2" />
            <DetailsItem icon="fa-solid fa-gift" class="text-gray-400"
              >Birthday: {{ formattedDate }}</DetailsItem
            >
            <DetailsItem icon="fa-solid fa-house" class="text-gray-400"
              >City: {{ user.city }}</DetailsItem
            >
            <DetailsItem
              icon="fa-solid fa-tower-broadcast"
              class="text-gray-400"
              >{{ formattedFollowersCount }}</DetailsItem
            >
          </div>
        </AppCard>
      </div>
    </Transition>
  </main>
</template>
