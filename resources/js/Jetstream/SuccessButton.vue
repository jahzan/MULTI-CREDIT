<template>
  <button
    @click="$emit('click', $event.target.value)"
    :type="type"
    :class="this.styleClass"
    class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-green-600 rounded-md shadow-sm hover:border-green-400 hover:bg-green-700 focus:outline-none focus:border-green-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "button",
    },
    styleClass: {
      type: String,
      default: "",
    },
  },
};
</script>
