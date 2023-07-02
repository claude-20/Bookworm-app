<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '@/stores/auth';

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
});
</script>


<template>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <router-link to="/" class="navbar-brand">
        <img alt="Vue logo" src="@/assets/logo.png" style="width: 10rem;">
      </router-link>

      <div class="d-flex gap-3" v-if="authStore.user" >
        <router-link to="/profile" class="btn"> {{ authStore.user.name }} </router-link>
        <button class="btn" @click="authStore.handleLogout" >Log out</button>
      </div>

      <div class="d-flex gap-3" v-else>
        <router-link to="/login" class="btn">Log in</router-link>
        <router-link to="/register" class="btn">Register</router-link>
      </div>
    </div>
  </nav>

  <router-view />

</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
