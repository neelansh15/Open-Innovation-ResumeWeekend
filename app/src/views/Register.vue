<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center">
    <div class="card" style="width:40rem">
      <h1 class="card-header">Register</h1>
      <div class="card-body">
        <form @submit.prevent="register()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" v-model="password" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="namehelper" v-model="username" required>
                <small id="namehelper" class="form-text text-muted">This will be used in your portfolio's URL</small>
            </div>
            <div class="form-group">
              <p class="lead text-muted">You will be required to enter portfolio details once logged in</p>
            </div>
                <button class="btn btn-dark" type="submit">Register</button>

                <p class="lead" style="color:white">Already registered? <router-link to="/login">Login here</router-link></p>
                <p class="lead"><router-link to="/">Back to Home</router-link></p>
        </form>
      </div>
    </div>
  </div>
</div>  
</template>

<script>
import axios from 'axios'
import qs from 'qs'

export default {
  name: 'Register',
  data(){
    return{
      postURL: 'http://localhost:80/resumeweekend/Post',
      email: '',
      password: '',
      username: ''
    }
  },
  methods:{
    register(){
      //Check if the fields are empty
      if(this.email != "" && this.username != "" && this.password != ""){
        //Destroy an already existing session
        if(this.$session.exists())
          this.$session.destroy()
        
        //Headers
        const headers = {
          'Content-Type' :'application/x-www-form-urlencoded'
          // 'Authorization': 4200
        }

        const data = {
          email: this.email,
          password: this.password,
          username: this.username
        }
        //Send a POST request to the PHP API
       axios({
         method: 'post',
         url: this.postURL,
         data: qs.stringify(data),
         headers: headers 
       }).then((response) => {
          if(response.data == "success")
          {
            this.$router.push('Admin')
          }
          else{
            alert(response.data)
          }
       }).catch((response) => {
         alert(response.data)
       });

      }
    }
  }
}
</script>

<style>

</style>