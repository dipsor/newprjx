
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import Vuetify from 'vuetify'
Vue.use(Vuetify)

Vue.prototype.$laroute = require('./laroute.js');

const eventBus = new Vue();

Vue.mixin({
    data: function () {
        return {
            eventBus: eventBus
        }
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('dropzone', require('vue2-dropzone'));

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

Vue.component('sidebar', require('./components/LayoutParts/LeftSideBarComponent.vue'));
Vue.component('navigations', require('./components/LayoutParts/Navigations.vue'));

Vue.component('tabs', require('./components/Partials/TabsComponent.vue'));
Vue.component('content-card', require('./components/Partials/ContentCardComponent.vue'));
Vue.component('breadcrumbs', require('./components/Partials/BreadcrumbsComponent.vue'));

Vue.component('dashboard-index', require('./components/Dashboard/DashboardIndexComponent.vue'));

Vue.component('users-index', require('./components/Users/UsersIndexComponent.vue'));
Vue.component('users-edit', require('./components/Users/UsersEditComponent.vue'));
Vue.component('users-edit-generals', require('./components/Users/UsersEditGeneralFormComponent.vue'));
Vue.component('users-edit-billings', require('./components/Users/UsersEditBillinsFormComponent.vue'));
Vue.component('users-change-pass', require('./components/Users/UsersChangePassFormComponent.vue'));

Vue.component('thesis-index', require('./components/Thesis/ThesisIndexComponent.vue'));
Vue.component('thesis-main-form', require('./components/Thesis/ThesisMainForm.vue'));
Vue.component('thesis-dropzone', require('./components/Thesis/ThesisDropzone.vue'));

Vue.component('custom-dialog', require('./components/CustomDialog.vue'));
Vue.component('landing-page', require('./components/LandingPage.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('users-list', require('./components/UsersListComponent.vue'));
Vue.component('users-form', require('./components/UsersFormComponent.vue'));
Vue.component('left-sidebar', require('./components/LeftSidebarComponent.vue'));
Vue.component('navigation', require('./components/NavigationComponent.vue'));
Vue.component('users-profile', require('./components/UsersProfileComponent.vue'));

const app = new Vue({

    el: '#app',
});



