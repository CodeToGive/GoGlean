<div id="titleHeader">
     <div class="filter">
         <div>

         <h2 id="findOp">
         <b>Hello <?= $_SESSION["name"] ?>,</b>

         </h2>
         </div>
     </div>
 </div>

<div class="container" style="margin-top:-50px;">
  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <label for="username" style="margin-top: 0px!important;">Name</label>
        <input type="text" name="name" value="<?= $_SESSION["name"] ?>" class="form-control" disabled>
      </div>
      <div class="col-lg-6">
        <label for="username" style="margin-top: 0px!important;">Account type</label>
        <?php
          switch ($_SESSION["type"]) {
            case '1':
              $type = "Gleaner";
              break;
            case '2':
              $type = "Farmer";
              break;
            case '3':
              $type = "Bank";
              break;
            default:
              $type = "Error";
              break;
          }
        ?>
        <input type="text" name="name" value="<?= $type ?>" class="form-control" disabled>
      </div>
      <div class="col-lg-6">
        <label for="username">Email</label>
        <input type="text" name="name" value="<?= $_SESSION["email"] ?>" class="form-control" disabled>
      </div>
      <div class="col-lg-6">
        <label for="username">Phone</label>
        <input type="text" name="name" value="<?= $_SESSION["phone"] ?>" class="form-control" disabled>
      </div>
      <div class="col-lg-3">
        <a href="#" class="btn btn-submit" style="width:100%" disabled>Edit profile</a>
      </div>
    </div>
  </div>

  <?php if ($_SESSION["type"] == 1) { ?>
    <div class="content">
      <div class="row">
        <div class="col-lg-9">
          <h3>See my next gleanings</h3>
        </div>
        <div class="col-lg-3">
          <a href="/?page=ads_choose" class="btn btn-submit" style="margin-top:0px;">Choisir un gleaning</a>
        </div>
      </div>
      <?php
        $ads = $db->prepare("SELECT * FROM advertisements WHERE avancement = 0");
        $ads->execute();
      ?>

      <table class="table">
        <thead style="font-weight:bold;">
          <td>#</td>
          <td>Farm</td>
          <td>Date</td>
          <td>State</td>
        </thead>
        <?php while ($l = $listApplications->fetch()) { ?>

          <tr>
            <td><?= $l["id"] ?></td>
            <td>
              <?php
                $req = $db->prepare("SELECT * FROM advertisements WHERE id = ?");
                $req->execute(array($l["ads_id"]));
                $reqId = $req->fetch();

                $req = $db->prepare("SELECT * FROM users WHERE id = ?");
                $req->execute(array($reqId["user_id"]));
                $req = $req->fetch();
                echo $req["name"];
                ?>
            </td>
            <td>
              <?php

                echo $reqId["begin_date"];
              ?>
            </td>
            <td><?php
              switch ($l["state"]) {
                case 0:
                  echo "Waiting";
                  break;
                case 1:
                  echo "Accept";
                  break;
                case 2:
                  echo "Done";
                  break;

                default:
                  echo "Waiting...";
                  break;
              }
             ?></td>
          </tr>

        <?php } ?>
      </table>
    </div>
  <?php } ?>

  <?php if ($_SESSION["type"] == 2) { ?>
    <div class="content">
      <div class="row">
        <div class="col-lg-9">
          <h3>My announces</h3>
        </div>
        <div class="col-lg-3">
          <a href="/?page=ads_create" class="btn btn-submit" style="margin-top:0px;">Add announce</a>
        </div>
      </div>
      <table class="table" style="margin-top:20px;">
        <thead style="font-weight:bold;">
          <th>#</th>
          <th>Begin date</th>
          <th>People required</th>
          <td>Planned group</td>
          <td>Planned bank</td>
          <th>Actions</th>
        </thead>
        <?php while ($a = $announce->fetch()) { ?>
          <tr>
            <td><?= $a["id"] ?></td>
            <td><?= $a["begin_date"] ?></td>
            <td><?= $a["minimum"] ?></td>
            <td>
              <?php
                $req = $db->prepare("SELECT * FROM applications WHERE ads_id = ? AND state = 1");
                $req->execute(array($a["id"]));
                $check = false;
                while($r = $req->fetch()){
                    $check= true;
                    $reqI = $db->prepare("SELECT * FROM users WHERE id = ?");
                    $reqI->execute(array($r["group_id"]));
                    $reqI = $reqI->fetch();
                    echo $reqI["name"]. ", ";
                }
                if(!$check){echo "<i>None</i>";}
              ?>
            </td>
            <td>bank</td>
            <td><a href="/?page=ads_watch&id=<?= $a['id'] ?>">Voir</a></td>
          </tr>
        <?php } ?>
      </table>

    </div>
  <?php } ?>


  <?php if ($_SESSION["type"] == 3) { ?>
    <div class="content">
      <h3>See announcements</h3>
      <?php
        $ads = $db->prepare("SELECT * FROM advertisements WHERE avancement = 1");
        $ads->execute();
      ?>

      <table class="table">
        <thead style="font-weight:bold;">
          <td>Farmer</td>
          <td>Gleaner Group</td>
          <td>Date</td>
          <td>Location</td>
          <td>Action</td>
        </thead>
          <?php
            while ($a = $ads->fetch()) {
              $req = $db->prepare("SELECT * FROM users WHERE id = ?");
              $req->execute(array($a["user_id"]));
              $farmer = $req->fetch();

              $temp = $db->prepare("SELECT * FROM applications WHERE state = 1 AND ads_id = ?");
              $temp->execute(array($a["id"]));
              ?>
              <tr>
              <td><?= $farmer["name"] ?></td>
              <td>
                <?php
                  while ($t = $temp->fetch()) {
                    $req = $db->prepare("SELECT * FROM users WHERE id = ?");
                    $req->execute(array($t["group_id"]));
                    $group = $req->fetch();
                    echo $group["name"] . ", ";
                  }
                ?>
              </td>
              <td><?= $a["begin_date"] ?></td>
              <td><?= json_decode($farmer["address"])->city; ?></td>
              <td>
                <form method="post">
                  <input type="hidden" name="id" value="<?= $a["id"] ?>">
                  <input type="submit" name="foodbankAccept" value="Accept">
                </form>
              </td>
            </tr>
            <?php }
          ?>
      </table>
    </div>
  <?php } ?>

</div>

<style media="screen">
  .content {
    margin-top: 10px;
  }
</style>
