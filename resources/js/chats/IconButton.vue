<template>
    <button class="p-2 rounded-sm bg-gray-200 text-gray-900 hover:bg-gray-600 hover:text-white" @click="$emit('click')">
        <svg class="inline w-4 h-4">
            <use v-bind:xlink:href="`#${id}`"></use>
        </svg>
        <span class="hidden md:inline"><slot><!--text--></slot></span>
    </button>
</template>

<script>
    export default {
        props: {
            id: String,
        }
    }
</script>
