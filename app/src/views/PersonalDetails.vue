<template>
  <div>
      <h1>Personal Details</h1>
      <p style="font-weight:400" class="lead">This information will be displayed on all your portfolios</p>
      <!-- Fill all the values in this form from the database -->
      <form>
        <div class="row">
          <div class="form-group col">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" class="form-control" v-model="name">
          </div>
          <div class="form-group col">
            <label for="mobile">Mobile No.:</label>
            (+91)<input type="number" name="mobile" id="mobile" class="form-control" v-model="mobile">
          </div>
        </div>

        <div class="form-group">
          <label for="bio">About me:</label>
          <textarea v-model="bio" maxlength="1000" cols="3" rows="4" type="text" class="form-control" name="bio" id="bio" aria-describedby="helpId" placeholder="About me" style="resize:none">
          </textarea>
          <small id="helpId" class="form-text text-muted">A Short and Precise description is suitable</small>
        </div>

        <div class="row">
          <div class="form-group col">
            <label for="github">Github:</label>
            <input type="text" name="github" id="github" class="form-control" v-model="github">
          </div>
          <div class="form-group col">
            <label for="devfolio">Devfolio:</label>
            <input type="text" name="devfolio" id="devfolio" class="form-control" v-model="devfolio">
          </div>
        </div>

        <div class="row">
          <div class="form-group col">
            <label for="facebook">Facebook:</label>
            <input type="text" name="facebook" id="facebook" class="form-control" v-model="facebook">
          </div>
          <div class="form-group col">
            <label for="twitter">Twitter:</label>
            <input type="text" name="twitter" id="twitter" class="form-control" v-model="twitter">
          </div>
        </div>

        <div class="form-group">
            <label for="linkedin">LinkedIn:</label>
            <input type="text" name="linkedin" id="linkedin" class="form-control" v-model="linkedin">
        </div>

        <button class="btn btn-dark">Update</button>

      </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'PersonalDetails',
    data(){
      return{
        getUserURL: 'http://localhost:80/resumeweekend/Get/users/',
        username: '',
        userDataJSON: '',

        name: '',
        mobile: 0,
        bio: '',
        github: '',
        devfolio: '',
        facebook: '',
        twitter: '',
        linkedin: '',
      }
    },
    created(){
      this.username = this.$session.get('username')
    },
    mounted(){
      //Load all the user data from the API
      axios.get(this.getUserURL + this.username)
      .then((response) => {
        this.userDataJSON = response.data

        this.name = this.userDataJSON.name
        this.mobile = this.userDataJSON.mobile
        this.bio = this.userDataJSON.bio
        this.github = this.userDataJSON.github
        this.devfolio = this.userDataJSON.devfolio
        this.facebook = this.userDataJSON.facebook
        this.twitter = this.userDataJSON.twitter
        this.linkedin = this.userDataJSON.linkedin
      })
      .catch((response) => {
        alert("Error: \n" + response.data)
      })
    }
}
</script>

<style>

</style>