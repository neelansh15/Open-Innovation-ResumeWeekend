<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Résumé Weekend</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to="/login" class="nav-link">Personal Details</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/register" class="nav-link">Portfolios</router-link>
                </li>
            </ul>

            <!-- For the side to the right of the navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                   <a class="nav-link" @click="logout()" style="cursor: pointer;">Log out</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
</template>

<script>
export default {
    name: 'Navbar',
    methods:{
        logout(){
            this.$session.destroy()
            this.$router.push('/')
        }
    }
}
</script>

<style>
@import '../assets/style.css'
</style>