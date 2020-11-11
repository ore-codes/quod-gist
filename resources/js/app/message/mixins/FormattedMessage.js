import marked from 'marked';

export default {
    methods: {
        marked: markdown => marked(markdown),
        highlight() {
            this.$refs.message.querySelectorAll('code').forEach(el => el.classList.add('microlight'));
            window.microlight.reset();
        }
    },
    updated() {
        this.highlight();
    },
    mounted() {
        this.highlight();
    }
}
