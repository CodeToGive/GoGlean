<?php
  if (!isset($_SESSION["id"]) AND empty($_SESSION["id"])) {
    header("Location: /");
  }

  if ($_SESSION["type"] == 1) {
    $listApplications = $db->prepare("SELECT * FROM applications WHERE group_id = ? ORDER BY id DESC");
    $listApplications->execute(array($_SESSION["id"]));
  } else if ($_SESSION["type"] == 2) {
    $announce = $db->prepare("SELECT * FROM advertisements WHERE user_id = ? ORDER BY id DESC");
    $announce->execute(array($_SESSION["id"]));
  }

  if (!empty($_POST["foodbankAccept"])) {
    $id = htmlspecialchars($_POST["id"]);

    $req = $db->prepare("UPDATE advertisements SET avancement = 2, bank_id = ? WHERE id = ?");
    $req->execute(array($_SESSION["id"], $id));
  }
