<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div
    class="z-10 bg-white px-4 py-3 flex items-center justify-between  border-gray-300 sm:px-6"
  >
    <div class="flex-1 flex justify-between sm:hidden">
      <inertia-link
            preserveState
            preserve-scroll
            :href="prev+'&keyword='+keyword+'&estado='+estado"
        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium  text-gray-700 bg-white hover:text-gray-500"
      >
        Previous
      </inertia-link>
      <inertia-link
            preserveState
            preserve-scroll
            :href="next+'&keyword='+keyword+'&estado='+estado"
            class="ml-3  inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium  text-gray-700 bg-white hover:text-gray-500"
      >
        Next
      </inertia-link>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          del
          <span class="font-medium">{{this.from - this.to}}</span>
          al
          <span class="font-medium">{{this.to}}</span>
          de
          <span class="font-medium">{{this.elements.last_page}}</span>
          pagianas de resultados
        </p>
      </div>
      <div>
        <nav
          class="relative z-0 inline-flex  shadow-sm -space-x-px"
          aria-label="Pagination"
        >
          <inertia-link
            preserveState
            preserve-scroll
            :href="prev+'&keyword='+keyword+'&estado='+estado"
            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
          >
            <span class="sr-only">Previous</span>
            <!-- Heroicon name: solid/chevron-left -->
            <i class="fas fa-angle-left fa-1x"></i>
          </inertia-link>
          <inertia-link
            preserveState
            preserve-scroll
            v-for="page in listPages"
            :key="page"
            v-bind:class="[
              page === elements.current_page ? 'border-blue-400' : 'border-gray-300 ',
            ]"
            :href="elements.path + '?page=' + page +'&keyword='+keyword+'&estado='+estado"
            class="relative inline-flex items-center px-4 py-2 border bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
          >
            {{ page }}
          </inertia-link>
          <inertia-link
            preserveState
            preserve-scroll
            :href="next+'&keyword='+keyword+'&estado='+estado"
            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
          >
            <span class="sr-only">Next</span>
            <!-- Heroicon name: solid/chevron-right -->
            <i class="fas fa-angle-right fa-1x"></i>
          </inertia-link>
        </nav>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["elements","offset","keyword","estado"],
  data() {
    return {
      from: 0,
      to : 0,
    }
  },
  computed: {
    next: function () {
      if (this.elements.next_page_url === null) {
        return this.elements.last_page_url;
      }
      return this.elements.next_page_url;
    },
    prev: function () {
      if (this.elements.prev_page_url === null) {
        return this.elements.first_page_url;
      }
      return this.elements.prev_page_url;
    },
    listPages: function () {
      if (!this.elements.last_page) {
        return [];
      }
      this.from = this.elements.current_page - this.offset; //agregar variable de compensacion.

      if (this.from < 1) {
         this.from = 1;
       }

      this.to = this.from + this.offset * 2;

      if (this.to > this.elements.last_page) {
        this.to = this.elements.last_page;
        this.from =  this.to  - (this.offset * 2);
      }
      
      if (this.from < 1) {
        this.from = 1;
      }

      var page = [];
      while (this.from <= this.to) {
        page.push(this.from);
        this.from++;
      }
      return page;
    },
  },
};
</script>
