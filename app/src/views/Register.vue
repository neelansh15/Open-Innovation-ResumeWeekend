<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center">
    <div class="card" style="width:40rem">
      <h1 class="card-header">Register</h1>
      <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="text" aria-describedby="namehelper">
                <small id="namehelper" class="form-text text-muted">This name will be used for your portfolio</small>
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
export default {

}
</script>

<style>

</style>