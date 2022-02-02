<template>
  <div class="relative" v-click-outside="clickedOutside">
    <input
      :value="value"
      @input="handleInput"
      @click="focus"
      :placeholder="placeholder"
      ref="input"
      tabindex="0"
      :class="inputClass"
    />
    <span
      v-if="value"
      @click.prevent="reset()"
      class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
    >
      <i class="fas fa-times"></i>
    </span>
    <span
      v-else
      @click.prevent="reset()"
      class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
    >
      <i class="fas fa-caret-down"></i>
    </span>
    <div
      v-show="showOptions"
      @click.self="handleSelf()"
      @focusout="showOptions = false"
      tabindex="0"
      :class="dropdownClass"
    >
      <ul class="py-1">
        <li
          v-for="(item, index) in searchResults"
          :key="index"
          @click="handleClick(item)"
          class="px-3 py-2 cursor-pointer hover:bg-gray-200"
        >
          {{ item.name }}
        </li>
        <li v-if="!searchResults.length" class="px-3 py-2 text-center">
          No se Encuentra Resutados
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      required: false,
    },
    placeholder: {
      type: String,
      required: false,
      default: "Enter text here.",
    },
    data: {
      type: Array,
      required: true,
    },
    inputClass: {
      type: String,
      required: false,
      default:
        "border border-gray-300 py-2 px-3 rounded-md focus:outline-none focus:shadow-outline w-full",
    },
    dropdownClass: {
      type: String,
      required: false,
      default:
        "absolute w-full z-50 bg-white border border-gray-300 mt-1 mh-48 overflow-hidden overflow-y-scroll rounded-md shadow-md",
    },
  },

  data() {
    return {
      showOptions: false,
      chosenOption: "",
      searchTerm: "",
    };
  },

  computed: {
    searchResults() {
      return this.data.filter((item) => {
        return item.name.toLowerCase().includes(this.searchTerm.toLowerCase());
      });
    },
  },

  methods: {
    reset() {
      this.$emit("input", "");
      this.chosenOption = "";
    },

    handleInput(evt) {
      this.$emit("input", evt.target.value);
      this.searchTerm = evt.target.value;
      this.showOptions = true;
    },

    handleClick(item) {
      this.showOptions = false;
      this.$emit("asignar", item);
      this.$emit("input", item.name);
      this.$emit("select");
      this.chosenOption = item.name;
      this.$refs.input.focus();
    },

    clickedOutside() {
      this.showOptions = false;

      if (!this.chosenOption) {
        this.$emit("input", "");
      }
    },
    focus: function (event) {
        this.showOptions = true;
    },
  },
};
</script>

<style scoped>
.mh-48 {
  max-height: 10rem;
}
</style>
