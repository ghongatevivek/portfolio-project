<template>
    <h1>Welcome to admin overview</h1>

    <router-link to="/">Home Page</router-link>
    
    <div>
        <button @click="logout">Log out</button>
    </div>
</template>

<script setup>
    import {useRouter} from 'vue-router'

    const router = useRouter()

    const logout = () => {
        localStorage.removeItem('token');
        router.push('/')
    }
</script>