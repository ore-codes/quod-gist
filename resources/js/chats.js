import Vue from 'vue';
import Vuex from 'vuex';
import ChatMessages from "./ChatMessages.vue";
import ChatForm from "./ChatForm.vue";
// import store from './store';

// Vue.use(Vuex);

new Vue({
    el: '#app',
    // store,
    components: {
        ChatMessages,
        ChatForm,
    },
    data: {
        messages: [],
    },
    props: {
        server: Object,
    },
    mounted() {
        // this.$store.commit('setServer', this.server);
    }
});
