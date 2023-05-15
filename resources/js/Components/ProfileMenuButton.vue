<script>
export default {
  props: {
    icon: String,
  },
};
</script>

<template>
  <button class="text-base">
    <i :class="icon" class="fa-lg fa-fw text-blue-500 mr-4"></i><slot></slot>
  </button>
</template>
