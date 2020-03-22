<template>
    <div class="projects">
        <div class="card" v-for="project in projects" :key="project.id" style="margin-top: 13px">
          <div class="card-body">
            <h3 class="card-title">
              {{ project.title }}
            </h3>

            <div class="card-subtitle" style="padding-bottom:10px">
              <span v-for="tag in project.tags" :key="tag" class="badge badge-secondary" style="margin:0 5px 0 0; padding: 4px">
                {{ tag }}
              </span>
            </div>

            <p class="card-text">{{ project.description }}</p>

            <a :href="project.github" target="_blank" class="card-link">
              <button class="btn btn-dark">
                <img src="../../assets/githublogo.png" alt="Github" width="16px" height="16px">
                &nbsp; &nbsp; Github
              </button>
            </a>
            <a :href="project.website" class="card-link">Website</a>

          </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        projects: Array
    },
    data(){
      return{

      }
    }
}
</script>