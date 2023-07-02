<template>

  <div class="d-flex justify-content-center">

      <div class="card p-5 " style="width: 25rem; background-color: rgb(234, 251, 251);" v-if="!showList">

        <div class=" d-grid gap-4 justify-content-center">
          <h3>SEARCH FOR BOOKS</h3>

          <div class="text-start">
              <label>Title</label>
              <input placeholder="Enter title" type="text" class="form-control rounded-start" style="max-width: 20rem;" v-model="title">
          </div>
          <div class="text-start">
              <label>Genre</label>
              <input placeholder="Enter genre" type="text" class="form-control rounded-start" style="max-width: 20rem;" v-model="genre" />
          </div>
          <div class="text-start">
              <label>Description</label>
              <input placeholder="Enter description" type="text" class="form-control rounded-start" v-model="description">
          </div>

          <div class="d-grid justify-content-start">
            <Button type="submit" @click="submitForm" tag="Search"></Button>
          </div>
        </div>

      </div>

      <div class="list-group m-5 p-2"  style="min-width: 40rem;" v-else>

        <h2 class="p-3">Search Results</h2>

          <div
            v-for="book in paginatedItems"
            :key="book.id"
            class="list-group-item list-group-item-action list-group-item-success"
            :class="{ 'active': isSelected(book) }"
            @click="selectBook(book)"
          >

            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{ book.title }}</h5>
              <small>Price: ${{ book.price }}</small>
            </div>

            <p class="mb-1">{{ book.description_min }}</p>
            <small>Genre: {{ book.genre }}</small>
          </div>

          <div class="d-flex justify-content-center gap-3 mt-3">
            <button class="btn btn-outline-primary" @click="previousPage" :disabled="currentPage === 1">Previous</button>
            <button class="btn btn-outline-primary" @click="nextPage" :disabled="currentPage === totalPages">Next</button>
          </div>

      </div>

  </div>

  </template>

  <script>


  import Button from '@/components/Button.vue'
  import axios from 'axios'

  export default {
    name: 'Bar',

    data() {
        return {
          books: [],
          title: '',
          genre: '',
          description: '',
          showList: false,
          filteredBooks: [],
          currentPage: 1, // Current page number
          pageSize: 5, // Number of items per page
        };
    },
    components: {
      Button
    },
    async created() {
        try {
        const response = await axios.get('/api/books');
        this.books = response.data; // Assign the response data to 'books'
        } catch (error) {
        console.error(error);
        }
    },
    computed: {
      paginatedItems() {
        const startIndex = (this.currentPage - 1) * this.pageSize;
        const endIndex = startIndex + this.pageSize;
        return this.filteredBooks.slice(startIndex, endIndex);
      },
      totalPages() {
        return Math.ceil(this.books.length / this.pageSize);
      },
    },
    methods: {
      submitForm() {
        this.filteredBooks = this.books.filter(book => {
        const titleMatch = book.title.toLowerCase().includes(this.title.toLowerCase());
        const genreMatch = book.genre.toLowerCase().includes(this.genre.toLowerCase());
        const descriptionMatch = book.description.toLowerCase().includes(this.description.toLowerCase());

        // Filter based on provided inputs
        if (this.title && this.genre && this.description) {
          return titleMatch && genreMatch && descriptionMatch;
        } else if (this.title && this.genre) {
          return titleMatch && genreMatch;
        } else if (this.title && this.description) {
          return titleMatch && descriptionMatch;
        } else if (this.genre && this.description) {
          return genreMatch && descriptionMatch;
        } else if (this.title) {
          return titleMatch;
        } else if (this.genre) {
          return genreMatch;
        } else if (this.description) {
          return descriptionMatch;
        } else {
          return true; // Return all books if no inputs provided
        }
      });

      console.log(this.filteredBooks);
      this.showList = true;
    },
    isSelected(book) {
      return book.id === this.$parent.selectedBook?.id;
    },
    selectBook(book) {
      this.$router.push({
        name: 'book',
        params: {
          id: book.id
        }
      });
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
 },
};
  </script>

  <style scoped>
  /* Component styles go here */
  label{
    color: black;
    font-weight: bold;
    font-size: 0.7rem;

  }
  </style>