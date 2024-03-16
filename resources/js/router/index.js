import { createRouter, createWebHistory } from 'vue-router'

//admin components
import AdminHomeIndex from '../components/admin/home/index.vue'

// home 
import HomeIndex from '../components/pages/home/index.vue'

// Not found component
import NotFound from "../components/NotFound.vue";
const routes = [
    // admin
    {
        path : '/admin/home',
        component : AdminHomeIndex
    },

    //index
    {
        path : '/',
        component : HomeIndex
    },

    // Not found
    {
        path : '/:pathMatch(.*)*',
        component : NotFound
    }
]
const router = createRouter({
    history : createWebHistory(),
    routes,
})

export default router