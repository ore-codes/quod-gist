<template>
    <div class="m-2 ml-8 p-2 bg-gray-200 border-2 rounded">
        <pre :style="`color: ${server.color}`"><slot><!--message--></slot></pre>
        <details>
            <summary>...</summary>
            <message-options></message-options>
        </details>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    import MessageOptions from "./MessageOptions";

    export default {
        components: {
            MessageOptions,
        },
        computed: {
            ...mapState(['server', 'user'])
        }
    }
</script>
