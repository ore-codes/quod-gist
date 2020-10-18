<template>
    <div>
        <icon-button id="edit" @click="$emit('edit')"></icon-button>
        <icon-button id="trash" @click="$emit('delete')"></icon-button>
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
