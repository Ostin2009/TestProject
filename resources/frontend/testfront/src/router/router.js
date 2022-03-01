import usersList from "@/pages/usersList";
import {createRouter, createWebHistory} from "vue-router";
import editUser from "@/pages/editUser";
import addUser from "@/pages/addUser";


const routes = [
    {
        path: '/',
        component: usersList
    },
    {
        path: '/edit',
        component: editUser
    },
    {
        path: '/add',
        component: addUser
    },
]

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL)
})

export default router
