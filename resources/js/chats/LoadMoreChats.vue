<template>
    <div class="flex justify-center py-4">
        <button class="text-blue-500 text-md hover:text-blue-400" @click="loadMoreMessages()">Load more...</button>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        methods: {
            ...mapActions(['loadMoreMessages']),
        }
    }
</script>
