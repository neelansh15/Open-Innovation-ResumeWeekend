<template>
  <div>
      <h1>Personal Details</h1>
      <p style="font-weight:400" class="lead">This information will be displayed on all your portfolios</p>
      <!-- Fill all the values in this form from the database -->
      <form @submit.prevent="update()">
        <div class="row">
          <div class="form-group col">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" class="form-control" v-model="fullname">
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
          <small id="helpId" class="form-text text-muted">A Short and Precise description goes a long way</small>
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

        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:1rem" v-if="showAlert">
          Success!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="showAlert = false">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      </form>
  </div>
</template>

<script>
import axios from 'axios'
import qs from 'qs'

export default {
    name: 'PersonalDetails',
    data(){
      return{
        getUserURL: 'http://localhost:80/resumeweekend/Get/users/',
        postUserURL: 'http://localhost:80/resumeweekend/Post/update',
        username: '',
        userDataJSON: '',

        fullname: '',
        mobile: 0,
        bio: '',
        github: '',
        devfolio: '',
        facebook: '',
        twitter: '',
        linkedin: '',

        showAlert: false
      }
    },
    methods: {
      update(){

        const data = {
          'username': this.username,
          'name': this.fullname,
          'mobile': this.mobile,
          'bio': this.bio,
          'github': this.github,
          'devfolio': this.devfolio,
          'facebook': this.facebook,
          'twitter': this.twitter,
          'linkedin': this.linkedin
        }

        const headers = {
          'Content-Type': 'application/x-www-form-urlencoded'
        }

        axios({
          method: 'post',
          url: this.postUserURL,
          data: qs.stringify(data),
          headers: headers
        })
        .then((response) => {
          //Show Success alert for 3sec using vue-toast-notification
          if(response.data == "success"){
            //All the settings are defaults (except the message), but still I am setting the options as I
            //am using this for the first time
            this.$toast.open({
              message: 'Updated',
              type: 'success',
              position: 'bottom',
              duration: 3000
            })
          }
        })
        .catch((response) => {
          alert("Error:\n" + response);
        })

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

        this.fullname = this.userDataJSON.name
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