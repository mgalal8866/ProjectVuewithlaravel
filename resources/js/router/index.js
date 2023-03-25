import { createRouter, createWebHistory, RouterView } from "vue-router";
import welcome from "../Views/welcome.vue";
import home from "../Views/Home.vue";
import Tr from "@/i18n/translation";

const router = createRouter({
    history: createWebHistory(
        import.meta.env.BASE_URL),
    routes: [{
        path: "/:locale?",
        component: RouterView,
        beforeEnter: Tr.routeMiddleware,
        children: [{
                path: "",
                name: "home",
                component: home,
            },
            {
                path: "dashboard",
                name: "welcome",
                component: welcome,
            },
        ],
    }, ],
});
export default router;