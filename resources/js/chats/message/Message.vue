<template>
    <div class="message self-stretch m-2 p-2 border-2 rounded" :style="cssVars">
        <h5 class="font-bold text-xl m-2 text-gray-500">{{ author.name }}</h5>
        <pre>{{ content }}</pre>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    export default {
        props: {
            author: Object,
            content: String,
        },
        computed: {
            ...mapState(['server', 'user']),
            cssVars() {
                return {
                    '--server-color': this.server.color,
                }
            },
        }
    }
</script>

<style scoped>
    .message {
        border-color: var(--server-color);
    }
</style>
