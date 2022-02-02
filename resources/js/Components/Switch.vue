<template>
  <!-- Container -->
  <div class="flex items-center justify-between">
    <!-- Title -->
    <div class="">
    
      <slot name="conten" class="items-center"></slot>
            <div v-if="active" class="inline-flex float-right text-xs font-semibold leading-5 text-green-900 bg-green-200 rounded-full x-2">
              Activo
            </div>
            <div v-else class="inline-flex float-right text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full x-2">
              Inactivo
            </div>
    </div>
    <!-- Switch Container -->
    <div class="flex w-3/10">
      <div class="flex items-center h-8 p-1 duration-300 ease-in-out bg-red-300 rounded-full w-14" @click="active = !active" :class="{ 'bg-green-400': active,}">
        <!-- Switch -->
        <div class="w-6 h-6 duration-300 ease-in-out transform bg-white rounded-full shadow-md" :class="{ 'translate-x-6': active,}"></div>
      </div>
    </div>
    <!-- Switch Container End -->
  </div>
</template>
<script>
export default {
  props:["active"],
};
</script>
