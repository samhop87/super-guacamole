/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import GamePlatform from "./components/game/components/GamePlatform"
import Start from "./components/game/components/Start"

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import Multiselect from "vue-multiselect";
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

// Components
Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Base.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('game-base', require('./components/game/Base.vue').default)
Vue.component('events-manager', require('./components/admin/Index').default)
Vue.component('multiselect', Multiselect)
Vue.component('pulse-loader', PulseLoader);

const routes = [
    { path: '/', component: Start},
    { path: '/game', component: GamePlatform}
]

// TODO: Add wildcard route for new 404 component.

const router = new VueRouter({
    mode: 'history',
    routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
}).$mount('#app')
