<script setup>

import { ref} from 'vue'
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const form = ref({
    email: '',
    password: ''
});

const getToken = async () => {
    await axios.get("/sanctum/csrf-cookie");
}

const handleLogin = async () => {
    await getToken();
    await axios.post('/login', {
        email: form.value.email,
        password: form.value.password
    });
    router.push("/");
}
</script>

<template>

    <div class="d-flex gap-4 justify-content-center p-5 m-5">

        <img src="https://e0.pxfuel.com/wallpapers/518/150/desktop-wallpaper-book-aesthetic-vintage-book-pages-thumbnail.jpg" class="card-img-top p-2" style="width: 20rem; border-radius: 1.5rem;">

        <div class="d-flex gap-4 justify-content-center pt-4">

            <form class="d-grid gap-4 justify-content-center" @submit.prevent="handleLogin" >

                <div class="d-flex justify-content-center">
                    <img alt="Vue logo" src="@/assets/logo.png" class="mb-4" style="width: 10rem;">
                </div>

                <input type="email" class="form-control" placeholder=" email address" v-model="form.email" />
                <input type="password" placeholder="password" class="form-control" v-model="form.password" />

                <div class=" d-grid text-center pt-1 mb-2 pb-1">
                    <button class="btn btn-primary btn-block mb-3">Login</button>
                    <a class="text-muted" href="#">Forgot password?</a>
                </div>

                <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <router-link to="/register" class="btn btn-outline-danger">Register</router-link>
                </div>

            </form>

        </div>

    </div>

</template>

<script>

import Button from '@/components/Button.vue'

export default {
  name: 'LoginView',

  data() {

  },
  components: {
    Button ,
  },

  methods: {

    }
}

</script>

<style>



</style>
