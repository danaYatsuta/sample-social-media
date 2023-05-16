<script>
const textColorInactive = 'text-gray-500';
const textColorActive = 'text-blue-500';

export default {
  props: {
    value: String,
    icon: String,
  },
  computed: {
    textColorClass() {
      if (this.isActive) {
        return textColorActive;
      }

      return textColorInactive;
    },
  },
};
</script>

<template>
  <div class="flex-1">
    <input type="radio" :id="value" name="menu-selection" class="peer hidden" />

    <label
      :for="value"
      class="flex flex-col items-center py-1 text-gray-500 peer-checked:text-blue-500"
    >
      <i :class="icon" class="text-2xl"></i>
      <span class="text-xs"><slot></slot></span>
    </label>
  </div>
</template>
