<template>
    <div class="flex-grow flex flex-col items-center justify-end">
        <div class="self-stretch" v-for="message in messages" :key="message.id">
            <user-message v-if="isUserMessage(message)"
                          :id="message.id" :message="message.content"></user-message>
            <message v-else :id="message.id"
                     :author="message.author" :date="message.created_at">{{ message.content }}</message>

            <ellipsis-loader v-if="messageLoaders.has(message.id)"></ellipsis-loader>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    import Message from "./message/Message";
    import UserMessage from "./message/UserMessage";
    import EllipsisLoader from "./EllipsisLoader";

    export default {
        components: {
            Message,
            UserMessage,
            EllipsisLoader,
        },
        computed: {
            ...mapState({
                messages: state => state.messages.messages,
                messageLoaders: state => state.messages.messageLoaders,
            }),
            ...mapState(['user']),
        },
        methods: {
            isUserMessage(message) {
                return message.author.id === this.user.id;
            },
        }
    }
</script>
