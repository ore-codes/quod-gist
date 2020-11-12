<template>
    <div class="min-h-screen-4/5 flex flex-col justify-between">
        <load-more-chats v-if="!messageFullyLoaded"></load-more-chats>
        <ellipsis-loader v-if="showLoader"></ellipsis-loader>
        <div v-if="noMessages" class="flex flex-grow justify-center items-center text-sm text-gray-400">No messages</div>
        <messages v-else></messages>
        <chat-form></chat-form>
    </div>
</template>

<script>
    import LoadMoreChats from "./LoadMoreChats";
    import EllipsisLoader from './EllipsisLoader';
    import Messages from './Messages';
    import ChatForm from './ChatForm';

    import {mapState, mapActions, mapGetters} from 'vuex';

    import './../bootstrap';
    import {PUSH_MESSAGES, REMOVE_MESSAGE, SETUP} from "./store/modules/mutation-types";

    export default {
        components: {
            LoadMoreChats,
            EllipsisLoader,
            Messages,
            ChatForm
        },
        props: {
            server: Object,
            user: Object,
        },
        computed: {
            ...mapState({
                messages: ({messages}) => messages.messages,
                showLoader: ({messages}) => messages.showLoader,
            }),
            ...mapGetters(['messageFullyLoaded']),
            noMessages() {
                return ! this.messages.length;
            },
        },
        methods: {
            ...mapActions(['fetchMessages']),
        },
        async mounted() {
            this.$store.commit(SETUP, {
                server: this.server,
                user: this.user,
            });
            await this.fetchMessages();
            window.Echo.private(`chat.${this.server.id}`)
                .listen('MessageSent', e => this.$store.commit(PUSH_MESSAGES, [e.message]))
                .listen('MessageDeleted', e => this.$store.commit(REMOVE_MESSAGE, e.id));
        }
    }
</script>
