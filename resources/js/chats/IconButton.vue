<template>
    <button>
        <svg class="w-12 h-12 bg-gray-200 text-gray-900 hover:bg-gray-600 hover:text-white">
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
