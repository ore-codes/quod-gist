<template>
    <div class="flex-grow flex flex-col items-center justify-end">
        <div class="self-stretch" v-for="message in messages" :key="message.id">
            <user-message v-if="isUserMessage">{{ message.content }}</user-message>
            <message v-else :author="message.author">{{ message.content }}</message>
        </div>
    </div>
</template>

<script>
    import Message from "./Message";
    import UserMessage from "./UserMessage";

    import {mapState} from 'vuex';

    export default {
        components: {
            Message,
            UserMessage
        },
        props: {
            author: Object,
            content: String,
        },
        computed: {
            ...mapState(['messages', 'user']),
        },
        methods: {
            isUserMessage(message) {
                return message.author.id === this.user.id;
            }
        }
    }
</script>
