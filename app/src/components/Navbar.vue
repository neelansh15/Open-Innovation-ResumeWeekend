<template>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background:none;">
    <div class="container">
        <a class="navbar-brand" href="#">Résumé Weekend</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="portfolios" class="nav-link" style="cursor: pointer;">Portfolios</a>
                </li>
                <li class="nav-item">
                    <a href="personaldetails" class="nav-link" style="cursor: pointer;">Personal Details</a>
                </li>
                <li class="nav-item">
                    <a href="projects" class="nav-link" style="cursor: pointer;">Projects</a>
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