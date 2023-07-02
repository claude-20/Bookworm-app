<template>
  <div class="bg-image p-4 text-center">

    <Hello />

    <div class="d-flex justify-content-center gap-3">

      <router-link to="/list" class="btn btn-outline-primary">Browse Books</router-link>
      <router-link to="/search" class="btn btn-outline-primary">Search Books</router-link>

    </div>

  </div>
</template>

<script>
// @ is an alias to /src
import Button from '@/components/Button.vue'
import Hello from '@/components/Hello.vue'

export default {
  name: 'HomeView',

  data() {

  },
  components: {
    Button ,
    Hello
  },

  methods: {

    }
}
</script>
