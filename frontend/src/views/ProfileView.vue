<template>
    <div class="d-flex gap-4 justify-content-center p-5 m-5">

        <div class="d-flex gap-4 justify-content-center p-5 m-5 border border-success" style="min-width: 50rem; border-radius: 1.5rem;">


            <table class="table table-hover" v-if="books.length > 0">
                <thead>
                    <tr>
                    <th scope="col">Book</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in books" :key="book.id" @click="selectBook(book)">
                    <th scope="row" class="text-left">{{book.title}}</th>
                    <td>{{book.type}}</td>
                    <td>${{ book.price }}</td>
                    <td>{{ formattedDateTime(book.time) }}</td>
                    </tr>
                </tbody>
            </table>

            <div v-else >
                <h1> You haven't made any transaction yet! </h1>
            </div>
        </div>
    </div>
  </template>

<script>
  import axios from 'axios'

  export default {
    name: 'ProfileView',

    data() {
      return {
        books: [],

      };
    },
    computed: {
        formattedDateTime() {
        return function(dateTimeString) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const formattedDateTime = new Date(dateTimeString).toLocaleString('en-US', options);
            return formattedDateTime;
        };
        }
    },
    async created() {
        try {
            await axios.get('/sanctum/csrf-cookie');
            const userBooksResponse = await axios.get('/api/user-books');
            const entries = userBooksResponse.data;

            const allBooksResponse = await axios.get('/api/books');
            const all = allBooksResponse.data;

            this.books = all.filter(book => {
            const matchingEntry = entries.find(entry => entry.book_id === book.id);
            if (matchingEntry) {
                book.type = matchingEntry.type;
                book.time = matchingEntry.created_at;
                return true;
            }
            return false;
            });
            console.log(this.books);
        } catch (error) {
            console.error(error);
        }
    },

    methods: {
        selectBook(book) {
        this.$router.push({
        name: 'book',
        params: {
            id: book.id
        }
    });
    },

        },
    };
  </script>

  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>

  </style>