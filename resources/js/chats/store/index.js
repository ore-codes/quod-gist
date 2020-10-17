import Vue from 'vue';
import Vuex from 'vuex';
import Axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        messages: [],
        server: null,
        user: null
    },
    mutations: {
        setMessages(state, messages) {
            state.messages = messages;
        },
        setServer(state, server) {
            state.server = server;
        },
        setUser(state, user) {
            state.user = user;
        },
    },
    actions: {
        async fetchMessages({ commit, state }) {
            const messages = (await Axios.get(`/servers/${state.server.id}/messages`)).data;
            messages.data && commit('setMessages', messages.data);
        },
        async storeMessage({commit, state}, message) {
            const resp = (await Axios.post(`/servers/${state.server.id}/messages`, {
                message
            })).data;
            resp.message && state.messages.push(resp.message);
        },
    }
});
