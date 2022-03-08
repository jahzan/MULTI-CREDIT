<template>
  <button
    :type="type"
    class="items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-yellow-500 border border-yellow-500 rounded-md  hover:border-yellow-300 hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:shadow-outline-yellow"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "submit",
    },
  },
};
</script>

<style>
</style>
