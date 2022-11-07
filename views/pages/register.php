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

            <!-- NOT WORKING -->
            <div class="col-lg-12">
              <div class="alert alert-danger" style="margin-top:15px;border:1px solid #CF4436;background:rgba(207,68,54,.2);color:#CF4436;text-align:justify;">
                <b>Warning:</b> We found a gleaning group that already exists in "Montréal", <u>click here to see</u>.
              </div>
            </div>
            <!-- / NOT WORKING -->

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

        <!-- NOT WORKING -->
        <div class="content">
          <button type="button" name="button" style="background-color:#3b5998!important;margin:0px;" class="btn btn-submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
            Link my facebook
          </button>
        </div>
        <!-- / NOT WORKING -->

        <div class="content">
          <input type="submit" name="sendRegister" value="Register" class="btn btn-submit" style="margin-top:0px;">
        </form>
      </div>
    </div>
  </div>
</div>
