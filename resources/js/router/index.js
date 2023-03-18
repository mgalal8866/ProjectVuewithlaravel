import { createRouter, createWebHistory, RouterView } from "vue-router";
import welcome from "../Views/welcome.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/:locale?",
            component: RouterView,
            children: [
                {
                    path: "",
                    name: "welcome",
                    component: welcome,
                },
                {
                    path: "dashboard",
                    name: "welcome",
                    component: welcome,
                },
            ],
        },
    ],
});
export default router;
