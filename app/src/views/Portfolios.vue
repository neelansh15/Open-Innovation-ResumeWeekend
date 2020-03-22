<template>
  <div>
      <h1>Portfolios</h1>
      <ul class="list-group">
        <li class="list-group-item" v-for="portfolio in portfolioJSON" :key="portfolio.id">
          <div>
            <h1>{{ portfolio.name }}</h1>
            <p>{{ portfolio.description }}</p>
          </div>
          <div>
            <button class="btn btn-info" style="margin-right:1rem">Edit</button>
            <button class="btn btn-danger">Delete</button>
            <!-- Make delete and edit comonents for this -->
          </div>
        </li>
      </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Portfolios',
    data(){
      return{
        portfolioGetURL: 'http://localhost:80/resumeweekend/get/portfolios/',
        userid: this.$session.get('userid'),

        portfolioJSON: ''
      }
    },
    mounted(){
      //Get portfolio data
      axios.get(this.portfolioGetURL + this.userid)
      .then((response) => {
        this.portfolioJSON = response.data
      })
      .catch((response) => {
        this.$toast.open({
          message: response,
          type: 'error',
          position: 'bottom',
          duration: 3000
        })
      })
    }
}
</script>

<style>

</style>