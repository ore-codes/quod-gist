<template>
    <div class="min-h-screen-4/5 flex flex-col justify-between">
        <messages></messages>
        <chat-form></chat-form>
    </div>
</template>

<script>
    import Messages from './message/Messages';
    import ChatForm from './ChatForm';

    import {mapActions, mapMutations} from 'vuex';

    export default {
        components: {
            Messages,
            ChatForm
        },
        props: {
            server: Object,
            user: Object,
        },
        methods: {
            ...mapMutations(['setServer', 'setUser']),
            ...mapActions(['fetchMessages']),
        },
        async mounted() {
            this.setServer(this.server);
            this.setUser(this.user);
            await this.fetchMessages();
        }
    }
</script>
