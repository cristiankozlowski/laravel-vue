require("./bootstrap");

window.Vue = require("vue");

import ListUsers from "./components/ListUsers.vue";
import PageLoading from "./components/PageLoading.vue";

Vue.component("PageLoading", PageLoading);

new Vue({
    el: "#app",
    components: {
        ListUsers
    }
});
