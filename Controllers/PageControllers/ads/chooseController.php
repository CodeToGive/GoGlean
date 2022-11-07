<?php
  $choose = $db->prepare("SELECT * FROM advertisements WHERE begin_date > NOW()");
  $choose->execute();

  if (!empty($_POST["sendChoose"])) {
    if(isset($_POST["id"]) AND !empty($_POST["id"])) {

      $req = $db->prepare("INSERT INTO applications (group_id, ads_id) VALUES (?, ?)");
      $req->execute(array($_SESSION["id"], htmlspecialchars($_POST["id"])));

    }
  }
