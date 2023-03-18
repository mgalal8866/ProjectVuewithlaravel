import { createStore } from 'Vuex'

const store = createStore({
    state: {
        count: 1
    },
    mutations: {
        increment(state) {
            state.count++
        }
    }
})
export default store;
// import Vue from 'vue';
// import Vuex from 'vuex';

// Vue.use(Vuex);

// import state from './state';
// import * as getters from './getters';
// import * as mutations from './mutations';
// import * as actions from './actions';

// export default new Vuex.Store({
//     state,
//     getters,
//     actions,
//     mutations

// });