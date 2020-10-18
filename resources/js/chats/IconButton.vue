<template>
    <button class="p-2 rounded-sm bg-gray-200 text-gray-900 hover:bg-gray-600 hover:text-white" @click="$emit('click')">
        <svg class="w-4 h-4">
            <use v-bind:xlink:href="`#${id}`"/>
        </svg>
    </button>
</template>

<script>
    export default {
        props: {
            id: String,
        }
    }
</script>
