<script>
export default {
  props: {
    icon: String,
  },
};
</script>

<template>
  <InertiaLink>
    <i :class="icon" class="fa-lg fa-fw mr-4 text-blue-500"></i><slot></slot>
  </InertiaLink>
</template>
