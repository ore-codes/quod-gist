<template>
    <div class="flex gap-1 justify-between m-2 mr-8">
        <img :src="author.profile_photo_url" class="w-12 h-12 rounded-full flex-shrink-0 border-2" alt="">
        <div class="flex-grow p-2 bg-white shadow-md rounded-md">
            <message-header :author="author.name" :date="date|toDate"></message-header>
            <div ref="message" class="message text-cool-gray-700" v-html="marked(content)"></div>
        </div>
    </div>
</template>

<script>
    import MessageHeader from "./MessageHeader";
    import FormattedMessage from './mixins/FormattedMessage.js';

    export default {
        components: {MessageHeader},
        mixins: [FormattedMessage],
        props: {
            author: Object,
            date: String,
        },
        computed: {
            content() {
                return this.$slots.default[0].text;
            }
        },
        filters: {
            toDate: date => new Date(date),
        }
    }
</script>
