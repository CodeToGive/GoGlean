<?php

  if ((!isset($_SESSION["id"]) AND empty($_SESSION["id"]) OR (!isset($_GET["id"]) OR empty($_GET["id"])))) {
    header("Location: /");
  }

  $id = htmlspecialchars($_GET["id"]);

  $listApplications = $db->prepare("SELECT * FROM applications WHERE ads_id = ? AND state = 0");
  $listApplications->execute(array($id));

  if (!empty($_POST["accept"]) OR !empty($_POST["refuse"])) {
    $applicationsId = htmlspecialchars($_POST["id"]);

    if (!empty($_POST["accept"])) {
      $next = 1;
    } else {
      $next = 0;
    }

    $req = $db->prepare("UPDATE applications SET state = ? WHERE id = ?");
    $req->execute(array($next, $applicationsId));

    $req = $db->prepare("UPDATE advertisements SET avancement = ? WHERE id = ?");
    $req->execute(array(1, $id));

    header("Location: /?page=profile");
  }
