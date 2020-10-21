<template>
    <div class="flex-grow flex flex-col items-center justify-end">
        <div class="self-stretch" v-for="message in messages" :key="message.id">
            <user-message v-if="isUserMessage(message)"
                          :id="message.id" :message="message.content"></user-message>
            <message v-else
                     :id="message.id" :author="message.author" :date="message.created_at"
                     :profile-photo="message.author.profile_photo_url">{{ message.content }}</message>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    import Message from "./message/Message";
    import UserMessage from "./message/UserMessage";

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
            ...mapState({
                messages: ({messages}) => messages.messages,
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
