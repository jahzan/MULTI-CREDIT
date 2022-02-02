<template>
    <button @click="$emit('click', $event.target.value)" :type="type" :class="this.styleClass" class="inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-500 border border-green-300 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:border-green-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },
            styleClass: {
                type: String,
                default: '',
            },
        }
    }
</script>
