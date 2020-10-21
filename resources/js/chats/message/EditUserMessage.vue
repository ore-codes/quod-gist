<template>
    <div class="clearfix">
        <textarea class="form-textarea w-full resize-none" v-model="newMessage">{{ content }}</textarea>
        <icon-button id="arr-left" @click="$emit('back')"></icon-button>
        <icon-button class="float-right" id="save" @click="$emit('update', newMessage)"></icon-button>
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
