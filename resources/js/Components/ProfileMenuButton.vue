<script>
export default {
  props: {
    icon: String,
  },
};
</script>

<template>
  <button>
    <i :class="icon" class="fa-lg fa-fw mr-4 text-blue-500"></i><slot></slot>
  </button>
</template>
