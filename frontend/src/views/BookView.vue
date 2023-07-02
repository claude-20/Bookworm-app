<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '@/stores/auth';

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();

});
</script>

<template>

<div class="d-flex gap-4 justify-content-center p-5 m-5">

    <div class="d-flex gap-4 justify-content-center p-5 m-5 border border-success" style="max-width: 50rem; border-radius: 1.5rem;"  v-if="book">

        <img src="https://e0.pxfuel.com/wallpapers/518/150/desktop-wallpaper-book-aesthetic-vintage-book-pages-thumbnail.jpg" class="card-img-top p-2" style="width: 12rem; border-radius: 1.5rem;">

        <div class="text-start pt-4 ">

            <h4 class="">{{ book.title }}</h4>
            <h6 class=" text-muted">Genre: {{ book.genre }}</h6>
            <h6 class=" text-muted pb-2">Description</h6>
            <p class="">{{ book.description }}</p>

            <div v-if="authStore.user" >

              <div class="d-flex justify-content-center gap-3" v-if="bookType === 'Rented'" >

                <button class="btn btn-outline-primary" @click="ReturnBook(book.id)">Return</button>
                <button class="btn btn-outline-primary" @click="BuyBook(book.id)">Buy ${{ (3 * book.price).toFixed(2) }}</button>

              </div>

              <div class="d-flex align-items-center justify-content-center gap-3" v-else-if="bookType === 'Bought'" >

                <p class="mb-0 me-2 text-danger">Read the book</p>
                <router-link to="" class="btn btn-outline-danger">Read</router-link>

              </div>

              <div class="d-flex justify-content-center gap-3" v-else >

                <button class="btn btn-outline-primary" @click="RentBook(book.id)">Rent ${{  book.price }}</button>
                <button class="btn btn-outline-primary" @click="BuyBook(book.id)">Buy ${{ (3 * book.price).toFixed(2) }}</button>

              </div>

            </div>

            <div class="d-flex align-items-center justify-content-center gap-3" v-else>

                    <p class="mb-0 me-2 text-danger">Login to buy the book</p>
                    <router-link to="/login" class="btn btn-outline-danger">Login</router-link>

            </div>

        </div>

    </div>

  </div>

  </template>

  <script>
  import axios from 'axios'

  export default {
    name: 'BookView',
    data() {
      return {
        books: [],
        entries: [],
        bookId: null,
        book: null,
        pay: null,
        bookType: null,
      };
    },
    async created() {
  try {
    const response = await axios.get('/api/books');
    this.books = response.data; // Assign the response data to 'books'
    this.bookId = this.$route.params.id; // Access the captured ID from the route params
    const bookIndex = this.bookId - 1; // Subtract 1 from the bookId to get the correct index
    this.book = this.books[bookIndex];

    await axios.get('/sanctum/csrf-cookie');
    const respon = await axios.get('/api/user-books');
    const entries = respon.data;
    const foundEntry = entries.find(entry => entry.book_id == this.$route.params.id);
    if (foundEntry) {
      this.bookType = foundEntry.type;
      console.log(this.bookType); // Log the bookType here
    }
  } catch (error) {
    console.error(error);
  }
},

    methods: {
    async RentBook(bookId) {
      try {
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.post(`/api/rent/${bookId}`);
        console.log(response.data);
        alert(response.data);
        window.location.reload();
      } catch (error) {
        console.error(error);
        alert('Failed to rent the book. Please try again later.');
      }
    },
    async BuyBook(bookId) {
      try {
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.post(`/api/buy/${bookId}`);
        console.log(response.data);
        alert(response.data);
        window.location.reload();
      } catch (error) {
        console.error(error);
        alert('Failed to buy the book. Please try again later.');
      }
    },
    async ReturnBook(bookId) {
      try {
        await axios.get('/sanctum/csrf-cookie');
        const response = await axios.delete(`/api/rents/${bookId}`);
        console.log(response.data);
        alert(response.data);
        window.location.reload();
      } catch (error) {
        console.error(error);
        alert('Failed to buy the book. Please try again later.');
      }
    }
  },
};
  </script>

