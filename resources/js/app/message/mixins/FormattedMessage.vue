<script>
    import Marked from 'marked';

    export default {
        filters: {
            marked: markdown => Marked.marked(markdown),
        }
    }
</script>
