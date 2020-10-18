<template>
    <div class="m-2 ml-8 p-2 bg-gray-200 border-2 rounded">
        <edit-user-message v-if="editMode" @back="editMode = false" @update="updateMessage">{{ message }}
        </edit-user-message>
        <div v-else>
            <pre class="whitespace-pre-wrap break-words" :style="`color: ${server.color}`">{{ message }}</pre>
            <details class="border-t">
                <summary class="text-sm">Options</summary>
                <message-options @edit="editMode = true" @delete="$emit('delete', id)"></message-options>
            </details>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Axios from 'axios';

    import EditUserMessage from "./EditUserMessage";
    import MessageOptions from "./MessageOptions";

    export default {
        components: {
            EditUserMessage,
            MessageOptions,
        },
        props: {
            id: Number,
            message: String,
        },
        data() {
            return {
                editMode: false,
            }
        },
        computed: {
            ...mapState(['server']),
        },
        methods: {
            async updateMessage(message) {
                await Axios.put(`/messages/${this.id}`, {message});
                this.$emit('update', this.id, message);
                this.editMode = false;
            },
        }
    }
</script>
