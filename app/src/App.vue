<template>
  <div id="app">
    <Navbar></Navbar>
    
    <router-view/>
  </div>
</template>

<script>
import Navbar from './components/Navbar'

export default {
  name: 'app',
  components:{
    Navbar
  }
}
</script>

<style>

</style>
