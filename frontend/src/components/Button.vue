<template>
  <div>
    <button class="btn btn-outline-primary" >{{ tag }}</button>
  </div>
</template>

<script>
export default {
  name: 'Button',
  props: {
    tag: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
