<template>
    <div class="min-h-screen-4/5 flex flex-col justify-between">
        <messages></messages>
        <chat-form></chat-form>
    </div>
</template>

<script>
    import Messages from './Messages';
    import ChatForm from './ChatForm';

    import {mapState, mapActions, mapMutations} from 'vuex';
    import '../bootstrap';

    export default {
        components: {
            Messages,
            ChatForm
        },
        props: {
            server: Object,
            user: Object,
        },
        computed: {
            ...mapState(['messages']),
        },
        methods: {
            ...mapMutations(['setServer', 'setUser']),
            ...mapActions(['fetchMessages']),
        },
        async mounted() {
            this.setServer(this.server);
            this.setUser(this.user);
            await this.fetchMessages();
            /*Echo.private(`chat.${this.server.id}`)
                .listen('MessageSent', e => {
                    this.messages.push(e.message);
                    console.log('message'+e.message);
                });*/
        }
    }
</script>
