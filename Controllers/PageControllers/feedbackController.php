<?php
  if (!empty($_GET["id"]) AND $_GET["user"]) {

    $id = htmlspecialchars($_GET["id"]);
    $userID = htmlspecialchars($_GET["user"]);

    $user = $db->prepare("SELECT * FROM users WHERE id = ?");
    $user->execute(array($userID));
    $user = $user->fetch();

    $ads = $db->prepare("SELECT * FROM advertisements WHERE id = ?");
    $ads->execute(array($id));
    $ads = $ads->fetch();

    if (!empty($_POST["scoreGleaner"])) {

      $req = $db->prepare("INSERT INTO feedback (sender_id, user_id, ads_id, score, comment) VALUES (?, ?, ?, ?, ?)");
      $req->execute(array($userID, -1, $id, htmlspecialchars($_POST["scoreGleaner"]), htmlspecialchars($_POST["commentGleaner"])));

    }

    if (!empty($_POST["scoreFarmer"])) {

      $req = $db->prepare("INSERT INTO feedback (sender_id, user_id, ads_id, score, comment) VALUES (?, ?, ?, ?, ?)");
      $req->execute(array($userID, $ads["user_id"], $id, htmlspecialchars($_POST["scoreFarmer"]), htmlspecialchars($_POST["commentFarmer"])));

    }

    if (!empty($_POST["scoreFoodBank"])) {

      $req = $db->prepare("INSERT INTO feedback (sender_id, user_id, ads_id, score, comment) VALUES (?, ?, ?, ?, ?)");
      $req->execute(array($userID, $ads["bank_id"], $id, htmlspecialchars($_POST["scoreFoodBank"]), htmlspecialchars($_POST["commentFoodBank"])));

    }

  } else {
    header("Location: /");
  }

  $req = $db->prepare("SELECT COUNT(*) AS nb FROM feedback WHERE sender_id = ? AND ads_id = ?");
  $req->execute(array($userID, $id));
  $r = $req->fetch();
  if($r["nb"] > 0) { header("Location: /"); }
