<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center">
    <div class="card" style="width:40rem">
      <h1 class="card-header">Login</h1>
      <div class="card-body">
        <form @submit.prevent="login()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" v-model="username" class="form-control" name="username" id="username" required>
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
import axios from 'axios'
import qs from 'qs'

export default {
  name: 'Login',
  data(){
    return{
      GETcheckURL: 'http://localhost:80/resumeweekend/Get/login',
      username: '',
      password: ''
    }
  },
  methods:{
    login(){
      if(this.username != '' && this.password != '')
      {
        const headers = {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
        const data = {
          username: this.username,
          password: this.password
        }

        //Get the response to know whether to log the user in or not
        axios({
          method: 'post',
          url: this.GETcheckURL,
          data: qs.stringify(data),
          headers: headers
        })
        .then((response) => {
          if(response.data == "1"){
            this.$session.set('username', this.username)
            this.$router.push('Admin/Portfolios')
          }
          else{
            alert(response.data)
          }

        })
        .catch((response) => {
          alert(response.data)
        })
      }
      else{
        alert('Please complete the username and password fields')
      }
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