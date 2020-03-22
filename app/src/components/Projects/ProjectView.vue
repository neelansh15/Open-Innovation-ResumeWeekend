<template>
    <div>
      
      <div class="container">

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
import Projects from './Projects'
import AddProjectButton from './AddProjectButton'

export default {
  components: {
    Projects, AddProjectButton
  },
  data(){
    return {
      // projects: [],
      tags: ['All'],
      selectedTag: '',
      searchterm: '',
      selectedProjects: [],
      searchorfilter: 1, //0 for search and 1 for filter

      // getURL: 'http://localhost/vueprojectlisting/Get',
      // postURL: 'http://localhost/vueprojectlisting/Post'

    }
  },
  props:{
    projects: Array
  },
  methods:{

    filter(){
      //Clean the array
      this.selectedProjects = []

      //Add
      this.projects.forEach(project => {
        project.tags.forEach(tag => {
          if(tag == this.selectedTag){
            if(!this.selectedProjects.includes(project))
              this.selectedProjects.push(project)
          }
        });
      });
    },

    search(){
      //Cleaning the array!
      this.selectedProjects = []

      //Add projects to this array
      this.projects.forEach(project => {
        if(project.title.toLowerCase().search(this.searchterm.toLowerCase()) != -1)
          this.selectedProjects.push(project)
      });

    },

  }

}

</script>

<style>
/* @import url('../assets/style.css'); */
</style>