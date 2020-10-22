import Axios from "axios";

export default {
    state: () => ({
        messages: [],
        totalMessages: 0,
        nextPage: '',
        showLoader: false,
        messageLoaders: new Set(),
    }),
    getters: {
        messageCount: state => state.messages.length,
        messageFullyLoaded: ({totalMessages}, {messageCount}) => messageCount === totalMessages,
    },
    mutations: {
        setMessages(state, messages) {
            state.messages = messages;
        },
        setTotalMessages(state, total) {
            state.totalMessages = total;
        },
        setNextPage(state, url) {
            state.nextPage = url;
        },
        addMessages(state, newMessages) {
            state.messages.unshift(...newMessages);
        },
        addMessageLoader(state, id) {
            state.messageLoaders.add(id);
        },
        deleteMessageLoader(state, id) {
            state.messageLoaders.delete(id);
        },
    },
    actions: {
        async storeMessage({commit, state, rootState}, message) {
            const resp = (await Axios.post(`/servers/${rootState.server.id}/messages`, {
                message
            })).data;
            resp.message && state.messages.push(resp.message);
        },
        async fetchMessages({commit, state, rootState}) {
            state.showLoader = true;
            const {data, total, next_page_url} =
                (await Axios.get(`/servers/${rootState.server.id}/messages`)).data;
            commit('setMessages', data.reverse());
            commit('setTotalMessages', total);
            commit('setNextPage', next_page_url);
            state.showLoader = false;
        },
        async loadMoreMessages({commit, state}) {
            state.showLoader = true;
            const {data, total, next_page_url} = (await Axios.get(state.nextPage)).data;
            commit('addMessages', data.reverse());
            commit('setTotalMessages', total);
            commit('setNextPage', next_page_url);
            state.showLoader = false;
        },
        async updateMessage({commit, state}, [messageId, message]) {
            commit('addMessageLoader', messageId);
            const sameId = ({id}) => messageId === id;
            await Axios.put(`/messages/${messageId}`, {message});
            await setTimeout(() => '', 9000);
            state.messages.find(sameId).content = message;
            commit('deleteMessageLoader', messageId);
        },
        async deleteMessage({commit, state}, id) {
            commit('addMessageLoader', id);
            const index = state.messages.findIndex(({id: msgId}) => msgId === id);
            state.messages.splice(index, 1);
            await Axios.delete(`/messages/${id}`);
            commit('deleteMessageLoader', id);
        },
    }
}
