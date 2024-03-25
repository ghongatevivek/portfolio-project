
<template>
    <div class="login">
        <div class="formLogin">
            <form @submit.prevent="login">
                <input type="email" placeholder="Enter email" v-model="form.email"/><br>
                <input type="password" placeholder="Enter password" v-model="form.password"/><br>
                <input type="submit" value="Submit"/><br>
    
            </form>

        </div>
    </div>
</template>


<script setup>
    import { reactive } from 'vue'
    import { useRouter } from 'vue-router'
    import axios from 'axios' // Import Axios

    let router = useRouter()
    let form = reactive({
        email: '',
        password: ''
    })

    const login = async () => {
        await axios.post('api/login', form)
            .then(response => {
                if (response.data.status) { // Removed unnecessary semicolon
                    let authToken = response.data.data.token;
                    if (authToken) {
                        localStorage.setItem('token', authToken)
                        // Assuming you have defined 'router' elsewhere and imported it
                        // Also corrected the route string
                        router.push('/admin/home');
                    }
                } 
            })
            .catch(error => {
                console.error('Error occurred during login:', error);
            });
    }
</script>
