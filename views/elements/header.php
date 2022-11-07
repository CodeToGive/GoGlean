<div class="header">
  <div class="container">
    <div class="row">

      <div class="col-lg-3">
        <h1 style="font-weight:bold;margin-top:20px;font-size:25px;">GoGlean</h1>
      </div>

      <div class="col-lg-5">
        <div class="right nav-links">
          <a href="/?page=community">Community</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="right nav-links">
          <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"])) { ?>
            <a href="/?page=logout">Logout</a>
            <a href="/?page=profile" class="btn-register">Profile</a>
          <?php } else { ?>
            <a href="/?page=login">Connexion</a>
            <a href="/?page=register" class="btn-register">Inscription</a>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>
</div>
