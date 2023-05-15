<script>
export default {
  props: {
    modelValue: String,
    type: {
      type: String,
      default: 'text',
    },
  },
  emits: ['update:modelValue'],
};
</script>

<template>
  <input
    :type="type"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    class="rounded-md border bg-gray-100 px-4 py-2"
  />
</template>
