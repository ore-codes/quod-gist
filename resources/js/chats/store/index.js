import Vue from 'vue';
import Vuex from 'vuex';

import messages from "./modules/messages";
import {SETUP} from "./modules/mutation-types";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        messages,
    },
    state: {
        server: null,
        user: null,
    },
    mutations: {
        [SETUP](state, {server, user}) {
            state.server = server;
            state.user = user;
        }
    },
});
