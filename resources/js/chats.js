import Vuex from 'vuex';
import Vue from 'vue';

import App from "./chats/App";
import store from './chats/store';

Vue.use(Vuex);

new Vue({
    el: '#app',
    store,
    components: {
        App
    },
});
