import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null
  }),
  getters: {
    user: (state) => state.authUser,
  },
  actions: {
    async getToken() {
      await axios.get('/sanctum/csrf-cookie');
    },
    async getUser() {
      await this.getToken();
      try {
        const response = await axios.get('/api/user');
        this.authUser = response.data;
      } catch (error) {
        // Handle the case when the user is not logged in or the request fails
        this.authUser = null;
        console.error(error);
      }
    },
    async handleLogout() {
      await axios.post("/logout");
      this.authUser = null;
    },
    async fetchUserBooks() {
      try {
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.get('/api/user-books');
        const entries = response.data;
        console.log(entries);
      } catch (error) {
        console.error(error);
        alert('Failed to fetch user books. Please try again later.');
      }
    },
  },
});

