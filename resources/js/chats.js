import Vuex from 'vuex';
import Vue from 'vue';

import App from "./app/App";
import store from './app/store';

Vue.use(Vuex);

new Vue({
    el: '#app',
    store,
    components: {
        App,
    },
});
