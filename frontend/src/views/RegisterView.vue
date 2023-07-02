<script setup>

import { ref} from 'vue'
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const getToken = async () => {
    await axios.get("/sanctum/csrf-cookie");
}

const handleRegister = async () => {
    await getToken();
    await axios.post('/register', {
        name: form.value.name,
        email: form.value.email,
        password: form.value.password,
        password_confirmation: form.value.password_confirmation
    });
    router.push("/login");
}
</script>

<template>

    <div class="d-flex gap-4 justify-content-center p-5 m-5">

        <img src="https://e0.pxfuel.com/wallpapers/518/150/desktop-wallpaper-book-aesthetic-vintage-book-pages-thumbnail.jpg" class="card-img-top p-2" style="width: 20rem; border-radius: 1.5rem;">

        <div class="d-flex gap-4 justify-content-center pt-4">

            <form class="d-grid gap-4 justify-content-center" @submit.prevent="handleRegister" >

                <div class="d-flex justify-content-center">
                    <img alt="Vue logo" src="@/assets/logo.png" class="mb-4" style="width: 10rem;">
                </div>

                <input type="text" placeholder="Name" class="form-control" v-model="form.name" />
                <input type="email" class="form-control" placeholder=" Email Address" v-model="form.email" />
                <input type="password" placeholder="Password" class="form-control" v-model="form.password" />
                <input type="password" placeholder="Password Confirmation" class="form-control" v-model="form.password_confirmation" />

                <div class=" d-grid text-center pt-1 mb-2 pb-1">
                    <button class="btn btn-primary btn-block mb-3">Register</button>
                </div>

                <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Already have an account?</p>
                    <router-link to="/login" class="btn btn-outline-danger">Login</router-link>
                </div>

            </form>

        </div>

    </div>

</template>



<script>

import Button from '@/components/Button.vue'

export default {
  name: 'RegisterView',

  data() {

  },
  components: {
    Button ,
  },

  methods: {

    }
}

</script>