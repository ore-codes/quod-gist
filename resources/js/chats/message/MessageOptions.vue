<template>
    <div>
        <icon-button title="Edit" id="icon-pencil" @click="$emit('edit')">Edit</icon-button>
        <icon-button title="Delete" id="icon-bin" @click="$emit('delete')">Delete</icon-button>
    </div>
</template>

<script>
    import IconButton from "../IconButton";

    export default {
        components: {
            IconButton,
        }
    }
</script>
