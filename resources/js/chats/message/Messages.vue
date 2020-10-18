<template>
    <div class="flex-grow flex flex-col items-center justify-end">
        <div class="self-stretch" v-for="message in messages" :key="message.id">
            <user-message v-if="isUserMessage(message)" :id="message.id" :message="message.content"
                          @update="updateMessage" @delete="deleteMessage"></user-message>
            <message v-else :author="message.author" :id="message.id">{{ message.content }}</message>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Axios from 'axios';

    import Message from "./Message";
    import UserMessage from "./UserMessage";

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
            },
            updateMessage(id, message) {
                this.messages.find(({id: msgId}) => msgId === id).content = message;
            },
            deleteMessage(id) {
                const index = this.messages.findIndex(({id:msgId}) => msgId === id);
                this.messages.splice(index, 1);
                Axios.delete(`/messages/${id}`);
            }
        }
    }
</script>
