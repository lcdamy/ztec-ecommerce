/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Vue.http.interceptors.push((request, next) => {
//     request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
//     request.headers.set('X-Requested-With', 'XMLHttpRequest');
//     next();
// });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('buy-button', require('./components/BuyButton.vue').default);
Vue.component('products-admin', require('./components/ProductsAdmin.vue').default);
Vue.component('orders-admin', require('./components/OrdersAdmin.vue').default);
Vue.component('create-product', require('./components/CreateProduct.vue').default);
Vue.component('home-page', require('./components/HomePage.vue').default);
Vue.component('orders-client', require('./components/OrdersClient.vue').default);
Vue.component('top-view', require('./components/TopView.vue').default);
Vue.component('create-top', require('./components/CreateTop.vue').default);
Vue.component('admin-page', require('./components/AdminPage.vue').default);
Vue.component('login-form', require('./components/LoginForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
