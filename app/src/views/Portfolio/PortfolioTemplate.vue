<template>
  <div>
    <div class="jumbotron text-center" :style="{backgroundImage: 'url(\'' + jumbobg + '\''}">
        <div class="container">
            <h1 class="display-3">{{ fullname }}</h1>
            <a :href="github" target="_blank"><button class="btn vbtn">Github</button> </a>
            <a :href="devfolio" target="_blank"><button class="btn vbtn">Devfolio</button> </a>
            <a :href="linkedin" target="_blank"><button class="btn vbtn">Linkedin</button> </a>
            
        </div>
    </div>

    <div class="container">
        <h2>About me:</h2>
        <p>{{ bio }}</p>

        <h2>Projects:</h2>
        <!-- <ProjectView :projects=projectDataJSON></ProjectView> -->

        <div class="row">
            <div class="col">
                <button class="btn btn-light" @click="searchorfilter=1" style="border-radius:0">Filter</button>
                <button class="btn btn-light" @click="searchorfilter=0" style="border-radius:0">Search</button>
            </div>
            <div class="col">
                <!-- Add this component "AddProject" in an admin panel, not for the end user -->
                <AddProjectButton style="float:right"></AddProjectButton>
            </div>
            </div>
            
            <br><br>

            <input type="text" name="search" id="search" class="search" placeholder="Search" v-if="searchorfilter==0" v-model="searchterm" @change="search()" @input="search()" />

            <!-- Filter -->
            <div class="form-group row" v-if="searchorfilter==1">
            <div class="col-md-4 col-sm-12">
                <label for="filter">Filter by tags:</label>
                <select name="filter" id="filter" class="filter form-control" v-model="selectedTag" @change="filter()">
                <option v-for="tag in tags" :key="tag">{{ tag }}</option>
                </select>
            </div>
            </div>
            
            <!-- Display the ProjectView component depending on the filter applied (if any) -->
            <Projects :projects=selectedProjects v-if="(searchorfilter == 1 && selectedTag != 'All') || (searchorfilter == 0 && searchterm != '') "></Projects>
            <Projects :projects=projects v-else></Projects>
        </div>

        
  </div>
</template>

<script>
import axios from 'axios'
// import ProjectView from '../../components/Projects/ProjectView'
import Projects from '../../components/Projects/Projects'

export default {
    name: 'View',
    components:{
        // ProjectView
        Projects
    },
    data(){
        return{
            jumbobg: require('../../assets/jumbobg.png'),
            username: this.$route.params.username,
            userID: '0',
            portfolioGetURL: 'http://localhost:80/resumeweekend/get/portfolios/',
            portfolioJSON:  '',
            userDataJSON: '',
            projectDataJSON: '',

            getUserURL: 'http://localhost:80/resumeweekend/Get/users/',
            getProjectsURL: 'http://localhost:80/resumeweekend/Get/projects/',
            fullname: '',
            mobile: 0,
            bio: '',
            github: '',
            devfolio: '',
            facebook: '',
            twitter: '',
            linkedin: '',

            projects: this.projectDataJSON,
            selectedProjects: []
        }
    },
    created(){
        //Check if username exists. If not, redirect to Home
        axios.get('http://localhost:80/resumeweekend/get/checkusername/' + this.username)
        .then((response) => {
            if(response.data == "1"){
                //Get information about the Portfolio
                //Get active portfolio too.... (Later. For now, show portfolio[0])

                //Get userId from username
                axios.get("http://localhost:80/resumeweekend/get/getIDfromUsername/" + this.username)
                .then((response) => {
                    this.userID = response.data

                    //Get portfolios for this userID
                    axios.get(this.portfolioGetURL + this.userID)
                    .then((response) => {
                        this.portfolioJSON = response.data[0]
                    })
                    .catch((response) => {
                        alert(response)
                    })

                    //Get all the user info
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

                    //Get projects info
                    axios.get(this.getProjectsURL + this.userID)
                    .then((response) => {
                        this.projectDataJSON = response.data
                    })
                    .catch((response) => {
                        alert(response.data)
                    })

                })
                .catch((response) => {
                    alert (response.data)
                })
            }
            else{
                this.$router.push('/')
            }
        })
        .catch((response) => {
            this.$toast.open({
                message: response,
                duraton: 3000,
                type: 'error',
                position: 'bottom'
            })
        })
    }
}
</script>

<style scoped>
@import '../../assets/themes/1.css';
</style>