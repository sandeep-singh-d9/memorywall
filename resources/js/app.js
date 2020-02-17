/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js';
import 'guillotine/css/jquery.guillotine.css';
import router from './router';
import { store } from './store.js';
import VueSession from 'vue-session'
import ColorPicker from 'vue-iro-color-picker';
var VueScrollTo = require('vue-scrollto');

import VueToastr2 from 'vue-toastr-2';
import 'vue-toastr-2/dist/vue-toastr-2.min.css';
import V_Session from 'v-session';
import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import FlashMessage from '@smartweb/vue-flash-message';
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
// install rules and localization
Object.keys(rules).forEach(rule => {
    extend(rule, rules[rule]);
});

window.toastr = require('toastr')
window.Vue = require('vue');
Vue.use(VueToastr2)
Vue.use(V_Session)
Vue.use(FlashMessage);
Vue.component('color-picker', ColorPicker);
Vue.component('date-picker', DatePicker);
Vue.use(VueSession)
Vue.use(VueScrollTo)
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    toastr
});
