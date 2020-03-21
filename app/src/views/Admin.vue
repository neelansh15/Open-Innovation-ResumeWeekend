<template>
  <div>
    <div :style="{backgroundImage: 'url(\'' + jumbobg + '\')'}">
        <Navbar></Navbar>
        <div class="jumbotron jumbo-admin" :style="{backgroundImage: 'url(\'' + jumbobg + '\')', color:'white',borderRadius: 0}">
          <div class="container">
            <h1 class="display-3">Hello there, {{ username }}!</h1>
          </div>
        </div>
    </div>

    <div class="container">
      <router-view></router-view>
    </div>

    <div class="jumbotron bg-dark" style="margin: 6rem 0 0 0; border-radius: 0; color:white">
      <h2>Résumé Weekend</h2>
      <p>Created as part of a project for the HackNITR Hackathon</p>
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
      jumbobg: require('../assets/jumbobg.png'),
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

<style scoped>

</style>