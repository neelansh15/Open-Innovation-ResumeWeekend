<template>
  <div>
      <h1>Personal Details</h1>
      <p style="font-weight:400" class="lead">This information will be displayed on all your portfolios</p>

      <!-- Fill all the values in this form from the database -->
      <form>
        <div class="row">
          <div class="form-group col">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" v-model="name">
          </div>
          <div class="form-group col">
            <label for="mobile">Mobile No.:</label>
            (+91)<input type="number" name="mobile" id="mobile" class="form-control" v-model="mobile">
          </div>
        </div>

        <div class="form-group">
          <label for="bio">About me:</label>
          <textarea maxlength="1000" cols="3" rows="4" type="text" class="form-control" name="bio" id="bio" aria-describedby="helpId" placeholder="About me" style="resize:none">
          </textarea>
          <small id="helpId" class="form-text text-muted">A Short and Precise description is suitable</small>
        </div>
      </form>
  </div>
</template>

<script>
export default {
    name: 'Personal Details'
}
</script>

<style>

</style>