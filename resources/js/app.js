require('./bootstrap');

window.Vue = require('vue');

import UsersTable from './components/UsersTable.vue';


new Vue({
    el: '#app',
    components: {
        UsersTable
    }
});
