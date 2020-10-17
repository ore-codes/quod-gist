<template>
    <form class="flex-grow-0 h-auto bg-cool-gray-200 border-t-2 px-2 py-1">
        <h4 class="font-bold">New message</h4>
        <div class="flex items-center">
            <label>
                <textarea placeholder="New message" class="form-textarea resize-none rounded-md shadow-sm m-2"></textarea>
            </label>
            <button type="submit" class="bg-gray-800 text-white p-2 rounded-full shadow-xl hover:bg-gray-600">
                <svg class="svg-icon">Send<use xlink:href="#paper-plane" /></svg>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "NewMessageForm"
    }
</script>
