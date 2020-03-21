<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center" :style="{backgroundImage: 'url(\'' + bg + '\')'}">
    <div>
      <h1>Résumé Weekend</h1>
      <h2 style="margin-left:5px">Showcase your personal projects in your own professional portfolio.</h2>

      <div class="d-inline-flex flex-row" style="margin-left:5px">
        <router-link to="/login"><button class="rBtn LoginBtn">Log in</button></router-link>
        <router-link to="/register"><button class="rBtn RegisterBtn">Register</button></router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
// @ is an alias to /src


export default {
  name: 'Home',
  data(){
    return{
      bg: require('../assets/nycbackground2.jpg')
      // bg: require('../assets/jumbobg.png')
    }
  }
}
</script>

<style>
.box{
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}
</style>
