import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import HomeComponent from "./pages/HomeComponent.vue";
import AboutComponent from "./pages/AboutComponent.vue";
import PostsComponent from "./pages/PostsComponent.vue";
import SinglePostComponent from "./pages/SinglePostComponent.vue";
import ContactComponent from "./pages/ContactComponent.vue";
import NotFoundComponent from "./pages/NotFoundComponent.vue";
import CategoryComponent from "./pages/CategoryComponent.vue";
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            meta: { nome: "Paolo" },
            component: HomeComponent,
        },
        {
            path: "/about",
            name: "about",
            component: AboutComponent,
        },
        {
            path: "/posts",
            name: "posts",
            component: PostsComponent,
        },
        {
            path: "/contact",
            name: "contact",
            component: ContactComponent,
        },

        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePostComponent,
        },
        {
            path: "/categories/:slug",
            name: "category",
            component: CategoryComponent,
        },
        {
            path: "*",
            name: "page-404",
            component: NotFoundComponent,
        },
    ],
});

export default router;
