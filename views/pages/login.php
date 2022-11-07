<div id="titleHeader">
     <div class="filter">
       <h2 id="findOp" style="font-weight:bold;">Welcome back !</h2>
     </div>
 </div>

<div class="container" style="margin-top:-50px;">
  <div class="row justify-content-md-center">
    <div class="col-lg-6">
      <div class="content">
        <h2 class="title">Login</h2>
        <hr>

        <?php if(isset($message) AND !empty($message)) { ?>
          <div class="alert alert-danger">
            <?= $message ?>
          </div>
        <?php } ?>

        <form method="post">

          <label for="username">Username <span class="required">*</span></label>
          <input type="text" name="username" placeholder="Camille" class="form-control">

          <label for="password">Password <span class="required">*</span></label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">

          <div class="row">
            <div class="col-lg-9">
              <a href="#" class="btn btn-white">I forgot my password</a>
            </div>
            <div class="col-lg-3">
              <input type="submit" name="sendLogin" value="Login" class="btn btn-submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
