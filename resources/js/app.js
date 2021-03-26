require('./bootstrap');

import Vue from  'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)


Vue.component(
    'people-component',
    require('./components/PeopleComponent.vue').default
);

const app = new Vue({
    el: '#app',
    store
});
