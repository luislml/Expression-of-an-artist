/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Masonry from 'masonry-layout';

window.Vue = require('vue');

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
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