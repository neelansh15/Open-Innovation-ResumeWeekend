<template>
  <div>
      {{ this.$route.params.username }}
      {{ userID }}
      {{ portfolioJSON }}
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'View',
    data(){
        return{
            username: this.$route.params.username,
            userID: '0',
            portfolioGetURL: 'http://localhost:80/resumeweekend/get/portfolios/',
            portfolioJSON:  ''
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

<style>

</style>