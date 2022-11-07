<?php

  // Check if connected
  if (isset($_SESSION["id"]) AND !empty($_SESSION["id"])) {
    header("Location: /?page=profile");
  }

  // Form
  if (!empty($_POST["sendLogin"])) {
    if (isset($_POST["username"]) AND !empty($_POST["username"])) {
      if (isset($_POST["password"]) AND !empty($_POST["password"])) {

        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        if (strlen($username) >= 3 AND strlen($username) < 35) {
          if (strlen($password) > 1 AND strlen($password) < 100) {

            $req = $db->prepare("SELECT COUNT(*) AS nb FROM users WHERE name = ?");
            $req->execute(array($username));
            $req = $req->fetch();

            if ($req["nb"] == 1) {

              $req = $db->prepare("SELECT * FROM users WHERE name = ?");
              $req->execute(array($username));
              $req = $req->fetch();

              if ($req["password"] == md5($password)) {

                $_SESSION["id"] = $req["id"];
                $_SESSION["name"] = $req["name"];
                $_SESSION["email"] = $req["email"];
                $_SESSION["type"] = $req["type"];
                $_SESSION["phone"] = $req["phone"];
                $_SESSION["address"] = $req["address"];

                header("Location: /?page=profile");
              }

            } else {
              $message = "Your account does not exists.";
            }
          } else {
            $message = "Your password have to be > 5 and < 100";
          }
        } else {
          $message = "Your username have to be > 3 and < 35";
        }
      } else {
        $message = "Please fill all inputs.";
      }
    } else {
      $message = "Please fill all inputs.";
    }
  }
