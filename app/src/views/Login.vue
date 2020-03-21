<template>
<div>
  <div class="home box d-flex justify-content-center align-items-center">
    <div class="card" style="width:40rem">
      <h1 class="card-header">Login</h1>
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
                <button class="btn btn-dark" type="submit">Login</button>

                <p class="lead" style="color:white">Not registered? <router-link to="/register">Register here</router-link></p>
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