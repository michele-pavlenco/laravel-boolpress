require("./bootstrap");
import Vue from "vue";
import VueCarousel from "vue-carousel";



window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Vue.use(VueCarousel);
window.Vue = require("vue");
import App from "./views/App";
import router from "./router.js";
const app = new Vue({
    el: "#root",
    render: (h) => h(App),
    router,
});
