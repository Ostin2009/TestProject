import usersList from "@/pages/usersList";
import {createRouter, createWebHistory} from "vue-router";
import carsList from "@/pages/carsList";


const routes = [
    {
        path: '/',
        component: usersList
    },
    {
        path: '/cars',
        component: carsList
    }
]

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL)
})

export default router
