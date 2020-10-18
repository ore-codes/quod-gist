<template>
    <div class="m-2 mr-8 p-2 border-2 rounded" :style="`border-color: ${server.color}`">
        <h5 class="font-bold text-sm text-gray-500 text-right">{{ author.name }}</h5>
        <pre class="whitespace-pre-wrap break-words"><slot><!--message--></slot></pre>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        props: {
            author: Object,
        },
        computed: {
            ...mapState(['server'])
        }
    }
</script>
