<template>
    <div class="m-2 ml-8 p-2 bg-gray-200 shadow-md rounded-md">
        <edit-user-message v-if="editMode"
                           @back="editMode = false" @update="evUpdate">{{ message }}</edit-user-message>
        <div v-else>
            <div ref="message" class="message" v-html="marked(message)"></div>
            <details class="border-t">
                <summary class="text-sm">Options</summary>
                <message-options @edit="editMode = true" @delete="evDelete"></message-options>
            </details>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    import EditUserMessage from "./EditUserMessage";
    import MessageOptions from "./MessageOptions";
    import FormattedMessage from './mixins/FormattedMessage.js';

    export default {
        components: {
            EditUserMessage,
            MessageOptions,
        },
        mixins: [FormattedMessage],
        props: {
            id: Number,
            message: String,
        },
        data: () => ({
            editMode: false,
        }),
        methods: {
            ...mapActions(['updateMessage', 'deleteMessage']),
            async evUpdate(message) {
                await this.updateMessage([this.id, message]);
                this.editMode = false;
            },
            async evDelete() {
                confirm('Are you sure you want to delete the message?') &&
                    await this.deleteMessage(this.id);
            },
        },
    }
</script>
