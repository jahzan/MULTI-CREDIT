<template>
<modal :show="isActive" :maxWidth="'xs'">
  <div
    class="mx-10 my-10 sm:mx-auto animate-spin-slow flex rounded-full  h-32 w-32 bg-gradient-to-br from-orange-600 via-transparent to-blue-600"
  >
    <div class="rounded-full h-28 w-28 m-auto bg-gray-50 items-center"></div>
  </div>
</modal>
</template>

<script>
import Modal from '@/Jetstream/ModalCenter'
export default {
    components:{
        Modal,
    },
    props:['isActive']
};
</script>

<style></style>
