<template>
  <div>
    <center>
      <div class="list-group m-5 p-2"  style="max-width: 50rem;" v-if="books">

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

      </div>
    </center>

    <div class="d-flex justify-content-center gap-3">
      <button class="btn btn-outline-primary" @click="previousPage" :disabled="currentPage === 1">Previous</button>
      <button class="btn btn-outline-primary" @click="nextPage" :disabled="currentPage === totalPages">Next</button>
    </div>

  </div>
</template>


<script>
// @ is an alias to /src
import axios from 'axios'

export default {
  name: 'ListView',

  data() {
    return {
      books: [],
      currentPage: 1, // Current page number
      pageSize: 5, // Number of items per page
      book: null
    };
  },
  components: {

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
      return this.books.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.books.length / this.pageSize);
    },
  },
  methods: {
    isSelected(book) {
      return book.id === this.$parent.selectedBook?.id;
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
    selectBook(book) {
      this.$router.push({
        name: 'book',
        params: {
          id: book.id
        }
      });
    }

  }
}
</script>
