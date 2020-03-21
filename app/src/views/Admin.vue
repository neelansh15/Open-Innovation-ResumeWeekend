<template>
  <div>
      <Navbar></Navbar>
      <div class="container">
        <h1 class="display-2">Hello there, {{ username }}!</h1>
      </div>
  </div>
</template>

<script>
import Navbar from '../components/Navbar'

export default {
  name: 'Admin',
  components:{
    Navbar
  },
  data(){
    return{
      activeTab: 0,
      username: ''
    }
  },
  created(){
    //If session does not exist, redirect to Home page at "/"
    if(!this.$session.exists())
      this.$router.push('/')
  },
  mounted(){
    this.username = this.$session.get('username')
  }
}
</script>

<style>

</style>