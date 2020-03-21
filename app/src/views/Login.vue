<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center">
    <div class="card" style="width:40rem">
      <h1 class="card-header">Login</h1>
      <div class="card-body">
        <form @submit.prevent="login()" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" v-model="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" v-model="password" class="form-control" name="password" id="password" required>
            </div>
            <button class="btn btn-dark" type="submit">Log in</button>

            <p class="lead" style="color:white">Not registered? <router-link to="/register">Register here</router-link></p>
            <p class="lead"><router-link to="/">Back to Home</router-link></p>

        </form>
      </div>
    </div>
  </div>
</div>  
</template>

<script>
export default {
  name: 'Login',
  data(){
    return{
      GETcheckURL: 'http://localhost:80/resumeweekend/Get/login'
    }
  },
  methods:{
    login(){
      
    }
  },
  created(){
    if(this.$session.exists()){
        this.$router.push('Admin')
    }
  }
}
</script>

<style>

</style>