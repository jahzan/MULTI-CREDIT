<template>
    <select name="" id="" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :value="value" @change="$emit('change', $event.target.value)" @input="$emit('input', $event.target.value)" ref="input" >
         <slot name="options"></slot>
    </select>
</template>
<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>