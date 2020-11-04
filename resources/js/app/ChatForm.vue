<template>
    <form @submit.prevent="storeMessage(message)" class="flex-grow-0 h-auto bg-cool-gray-200 border-t-2 px-2 py-1">
        <h4 class="font-bold">New message</h4>
        <div class="flex items-center w-full md:p-4">
            <textarea v-model="message" placeholder="New message" class="flex-grow form-textarea resize-none rounded-md shadow-sm m-2"></textarea>
            <button type="submit" class="bg-gray-800 text-white p-2 rounded-full shadow-xl hover:bg-gray-600">
                <svg class="svg-icon">Send<use xlink:href="#paper-plane" /></svg>
            </button>
        </div>
    </form>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        data() {
            return {
                message: '',
            }
        },
        methods: {
            ...mapActions(['storeMessage']),
        }
    }
</script>
