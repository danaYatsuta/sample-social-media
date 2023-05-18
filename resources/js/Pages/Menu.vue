<script>
import AuthLayout from '@/Layouts/AuthLayout.vue';

export default {
  components: {
    AuthLayout,
  },
  props: {
    user: Object,
  },
  computed: {
    avatarImage() {
      return this.user.avatarImage || this.$placeholderAvatar;
    },
  },
};
</script>

<template>
  <AuthLayout bg-color="light-gray" :nav-at-the-bottom="true">
    <div
      class="sticky top-0 flex items-center justify-between p-4 text-2xl font-bold shadow-sm"
    >
      <h1>More</h1>
      <i class="fa-solid fa-gear text-blue-500"></i>
    </div>

    <div class="m-4 flex flex-col gap-4">
      <InertiaLink
        :href="$route('users.show', { user })"
        class="flex items-center justify-between rounded-md bg-gray-200 p-4"
      >
        <div class="flex gap-2">
          <img
            :src="avatarImage"
            alt="Your avatar image"
            class="aspect-square h-10 rounded-full"
          />
          <div class="flex flex-col justify-between">
            <p>{{ user.name }}</p>
            <p class="text-sm text-gray-400">Open profile</p>
          </div>
        </div>
        <i class="fa-solid fa-chevron-right text-gray-400"></i>
      </InertiaLink>

      <InertiaLink
        :href="$route('sessions.destroy')"
        method="delete"
        as="button"
        class="flex items-center gap-2"
      >
        <i class="fa-solid fa-power-off text-blue-500"></i><span>Log out</span>
      </InertiaLink>
    </div>
  </AuthLayout>
</template>
