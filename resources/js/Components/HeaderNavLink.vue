<script>
const textColorInactive = 'text-gray-500';
const textColorActive = 'text-blue-500';

const componentCategories = {
  home: [],
  search: [],
  notifications: [],
  more: ['Menu', 'User/Show'],
};

export default {
  props: {
    value: String,
    icon: String,
  },
  computed: {
    textColorClass() {
      if (componentCategories[this.value].includes(this.$page.component)) {
        return textColorActive;
      }

      return textColorInactive;
    },
  },
};
</script>

<template>
  <InertiaLink
    class="flex flex-1 flex-col items-center py-1"
    :class="textColorClass"
  >
    <i :class="icon" class="text-2xl"></i>
    <span class="text-xs"><slot></slot></span>
  </InertiaLink>
</template>
