<div id="titleHeader">
     <div class="filter">
       <h2 id="findOp" style="font-weight:bold;">Sign up</h2>
     </div>
 </div>
<div class="container" style="margin-top:-50px;">
  <div class="row justify-content-md-center">
    <div class="col-lg-6">
      <div class="content">

        <?php if(isset($message) AND !empty($message)) { ?>
          <div class="alert alert-danger">
            <?= $message ?>
          </div>
        <?php } ?>

        <form method="post">

          <label for="username" style="margin-top:0px;">Username <span class="required">*</span></label>
          <input type="text" name="username" placeholder="Camille" class="form-control">

          <label for="password">Password <span class="required">*</span></label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">

          <label for="password_again">Confirm password <span class="required">*</span></label>
          <input type="password" name="password_again" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">

      </div>

      <div class="content">

          <label for="iam" style="margin-top:0px;">I am a.. <span class="required">*</span></label>
          <select class="form-control" name="iam">
            <option value="glaner">Gleaner Group</option>
            <option value="foodbank">Food Bank</option>
            <option value="farmer">Farmer</option>
          </select>

          <label for="phone">Phone number <span class="required">*</span></label>
          <input type="text" name="phone" placeholder="(514) 728-0116" class="form-control">

          <label for="email">Email <span class="required">*</span></label>
          <input type="email" name="email" placeholder="contact@earthday.ca" class="form-control">

          <div class="row">
            <div class="col-lg-4">
              <label for="country">Country <span class="required">*</span></label>
              <input type="text" name="country" placeholder="Canada" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="city">City <span class="required">*</span></label>
              <input type="text" name="city" placeholder="Montreal" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="postal">Postal code <span class="required">*</span></label>
              <input type="text" name="postal" placeholder="" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="app">App</label>
              <input type="text" name="app" placeholder="" class="form-control">
            </div>
            <div class="col-lg-8">
              <label for="street">Address <span class="required">*</span></label>
              <input type="text" name="street" placeholder="" class="form-control">
            </div>
          </div>

        </div>

        <div class="content">
          <input type="submit" name="sendRegister" value="Register" class="btn btn-submit" style="margin-top:0px;">
        </form>
      </div>
    </div>
  </div>
</div>
