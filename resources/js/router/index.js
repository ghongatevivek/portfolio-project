import { createRouter, createWebHistory } from 'vue-router'

//admin components
import AdminHomeIndex from '../components/admin/home/index.vue'

// login component
import Login from '../components/auth/login.vue'

// home 
import HomeIndex from '../components/pages/home/index.vue'

// Not found component
import NotFound from "../components/NotFound.vue";
const routes = [
    // admin
    {
        path : '/admin/home',
        name : 'adminHome',
        component : AdminHomeIndex,
        meta : {
            authRequired : true,
        }
    },

    //index
    {
        path : '/',
        name : 'Home',
        component : HomeIndex,
        meta : {
            authRequired : false,
        }
    },

    //login 
    {
        path : '/login',
        name : 'Login',
        component : Login,
        meta : {
            authRequired : false,
        }
    },
    // Not found
    {
        path : '/:pathMatch(.*)*',
        name : 'notFound',
        component : NotFound,
        meta : {
            authRequired : false,
        }
    }
]
const router = createRouter({
    history : createWebHistory(),
    routes,
})

router.beforeEach((to, from) => {
    if(to.meta.authRequired && !localStorage.getItem('token')){
        return {name : 'Login'}
    }
})
export default router