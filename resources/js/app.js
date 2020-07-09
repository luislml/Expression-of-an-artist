/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Masonry from 'masonry-layout';

window.Vue = require('vue');

import VueFormulate from '@braid/vue-formulate'
import { es } from '@braid/vue-formulate-i18n'
Vue.use(VueFormulate, {
  plugins: [es],
  locale: 'es'
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/* Componets */
Vue.component('form-artist', require('./components/artists/FormArtist.vue').default);
Vue.component('form-school', require('./components/school/FormSchool.vue').default);
Vue.component('notificayions-dash', require('./components/notifications/NotificacionsDash.vue').default);
// components account
Vue.component('change-user', require('./components/ChangeUser.vue').default);
Vue.component('login', require('./components/accounts/Login.vue').default);
Vue.component('register', require('./components/accounts/Register.vue').default);
Vue.component('update-account', require('./components/accounts/UpdateAccount.vue').default);
Vue.component('delete-account', require('./components/accounts/DeleteAccount.vue').default);
// notifications
Vue.component('notifications-view', require('./components/notifications/NotificacionsShow.vue').default);
Vue.component('notification-show', require('./components/notifications/Notification.vue').default);
Vue.component('notification-general', require('./components/notifications/NotificationsGeneral.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vuetify from 'vuetify';
Vue.use(Vuetify);
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});




const msnry = new Masonry( '.grid', {
  // options
  itemSelector: '.grid-item',
  columnWidth: 300,
  gutter: 20
});


/* Custom js */
/* -----------------------------custom------------------------------------- */


/* Custom js */
/* ------------------------------------------------------- */