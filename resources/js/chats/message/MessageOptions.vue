<template>
    <div>
        <icon-button title="Edit" id="icon-pencil" @click="$emit('edit')"></icon-button>
        <icon-button title="Delete" id="icon-bin" @click="$emit('delete')"></icon-button>
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
