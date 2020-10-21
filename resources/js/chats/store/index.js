import Vue from 'vue';
import Vuex from 'vuex';
import Axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        messages: [],
        server: null,
        user: null,
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
        async storeMessage({commit, state}, message) {
            const resp = (await Axios.post(`/servers/${state.server.id}/messages`, {
                message
            })).data;
            resp.message && state.messages.push(resp.message);
        },
        async fetchMessages({ commit, state }) {
            const messages = (await Axios.get(`/servers/${state.server.id}/messages`)).data;
            messages.data && commit('setMessages', messages.data.reverse());
        },
        async updateMessage({state}, [messageId, message]) {
            const sameId = ({id}) => messageId === id;
            await Axios.put(`/messages/${messageId}`, {message});
            state.messages.find(sameId).content = message;
        },
        async deleteMessage({state}, id) {
            const index = state.messages.findIndex(({id: msgId}) => msgId === id);
            state.messages.splice(index, 1);
            await Axios.delete(`/messages/${id}`);
        },
    }
});
