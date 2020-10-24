<template>
    <div class="flex gap-1 justify-between m-2 mr-8">
        <img :src="author.profile_photo_url" class="w-12 h-12 rounded-full flex-shrink-0 border-2" alt="">
        <div class="flex-grow p-2 bg-white shadow-md rounded-md">
            <message-header :author="author.name" :date="date|toDate"></message-header>
            <pre class="whitespace-pre-wrap break-words font-sans text-cool-gray-700"><slot><!--message--></slot></pre>
        </div>
    </div>
</template>

<script>
    import MessageHeader from "./MessageHeader";

    export default {
        components: {MessageHeader},
        props: {
            author: Object,
            date: String,
        },
        filters: {
            toDate: date => new Date(date),
        }
    }
</script>
