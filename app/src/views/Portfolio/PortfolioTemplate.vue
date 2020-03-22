<template>
  <div>
      {{ this.$route.params.username }}
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'View',
    data(){
        return{
            username: this.$route.params.username
        }
    },
    created(){
        //Check if username exists. If not, redirect to Home
        axios.get('http://localhost:80/resumeweekend/get/checkusername/' + this.username)
        .then((response) => {
            if(response.data == "1"){
                //Get information about the Portfolio
                //Get active portfolio too.... (Later. For now, show portfolio[0])
                
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