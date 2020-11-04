import Axios from "axios";
import {
    ADD_MESSAGE_LOADER,
    DELETE_MESSAGE_LOADER,
    EDIT_MESSAGE,
    PUSH_MESSAGES,
    REMOVE_MESSAGE,
    SHOW_LOADER,
    UNSHIFT_MESSAGES,
} from "./mutation-types";

const messageHasId = id => message => message.id === id;

function state() {
    return {
        messages: [],
        totalMessages: 0,
        nextPage: '',
        showLoader: false,
        messageLoaders: new Set(),
    };
}

const getters = {
    messageCount: state => state.messages.length,
    messageFullyLoaded: (state, getters) => getters.messageCount === state.totalMessages,
};

const mutations = {
    [UNSHIFT_MESSAGES](state, {data, total, next_page_url}) {
        state.messages.unshift(...data.reverse());
        state.totalMessages = total;
        state.nextPage = next_page_url;
        state.showLoader = false;
    },
    [PUSH_MESSAGES](state, messages) {
        state.messages.push(...messages);
    },
    [EDIT_MESSAGE](state, {id, newMessage}) {
        state.messages.find(messageHasId(id)).content = newMessage;
        state.messageLoaders.delete(id);
    },
    [REMOVE_MESSAGE](state, id) {
        const index = state.messages.findIndex(messageHasId(id));
        state.messages.splice(index, 1);
        state.messageLoaders.delete(id);
    },
    [SHOW_LOADER](state) {
        state.showLoader = true;
    },
    [ADD_MESSAGE_LOADER](state, id) {
        state.messageLoaders.add(id);
    },
    [DELETE_MESSAGE_LOADER](state, id) {
        state.messageLoaders.delete(id);
    },
};

const actions = {
    async storeMessage({commit, state, rootState}, messageText) {
        const
            resp = await Axios.post(`/servers/${rootState.server.id}/messages`, {message: messageText}),
            message = (await resp.data).message;
        commit(PUSH_MESSAGES, [message]);
    },
    async fetchMessages({commit, state, rootState}) {
        commit(SHOW_LOADER);
        const resp = (await Axios.get(`/servers/${rootState.server.id}/messages`)).data;
        commit(UNSHIFT_MESSAGES, resp);
    },
    async loadMoreMessages({commit, state}) {
        commit(SHOW_LOADER);
        commit(UNSHIFT_MESSAGES, (await Axios.get(state.nextPage)).data);
    },
    async updateMessage({commit, state}, [id, newMessage]) {
        commit(ADD_MESSAGE_LOADER, id);
        await Axios.put(`/messages/${id}`, {newMessage});
        commit(EDIT_MESSAGE, {id, newMessage});
    },
    async deleteMessage({commit, state}, id) {
        commit(ADD_MESSAGE_LOADER, id);
        await Axios.delete(`/messages/${id}`);
        commit(REMOVE_MESSAGE, id);
    },
};

export default {state, getters, mutations, actions};
