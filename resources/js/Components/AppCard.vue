<script>
const roundedRadiusClasses = {
  'xl': 'rounded-xl',
  '2xl': 'rounded-2xl',
};

const roundedSidesClasses = {
  top: 'rounded-b-none',
};

export default {
  props: {
    roundedRadius: {
      type: String,
      default: '2xl',
    },
    roundedSides: {
      type: String,
      default: 'all',
    },
  },
  computed: {
    roundedRadiusClass() {
      return roundedRadiusClasses[this.roundedRadius];
    },
    roundedSidesClass() {
      if (this.roundedSides === 'all') {
        return '';
      }

      return roundedSidesClasses[this.roundedSides];
    },
  },
};
</script>

<template>
  <div :class="[roundedRadiusClass, roundedSidesClass]" class="bg-white p-4">
    <slot></slot>
  </div>
</template>
