<template>
    <div class="clearfix">
        <textarea class="form-textarea w-full resize-none" v-model="newMessage">{{ content }}</textarea>
        <icon-button title="Cancel" id="icon-undo2" @click="$emit('back')"></icon-button>
        <icon-button title="Save" id="icon-checkmark" class="float-right" @click="$emit('update', newMessage)"></icon-button>
    </div>
</template>

<script>
    import IconButton from "../IconButton";

    export default {
        components: {
            IconButton,
        },
        data: () => ({
            newMessage: '',
        }),
        computed: {
            content() {
                return this.$slots.default[0].text;
            }
        },
        mounted() {
            this.newMessage = this.content;
        }
    }
</script>
