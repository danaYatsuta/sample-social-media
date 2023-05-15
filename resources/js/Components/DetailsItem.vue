<script>
export default {
  props: {
    icon: String,
  },
};
</script>

<template>
  <div><i :class="icon" class="fa-fw mr-4 text-gray-400"></i><slot></slot></div>
</template>
