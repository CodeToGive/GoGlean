<?php

  // Check if connected
  if (isset($_SESSION["id"]) AND !empty($_SESSION["id"])) {
    header("Location: /?page=profile");
  }

  // Form
  if(!empty($_POST["sendRegister"])) {
    if (isset($_POST["username"]) AND (!empty($_POST["username"]))) {
      if (isset($_POST["email"]) AND (!empty($_POST["email"]))) {
        if (isset($_POST["password"]) AND (!empty($_POST["password"]))) {
          if (isset($_POST["password_again"]) AND (!empty($_POST["password_again"]))) {
            if (isset($_POST["iam"]) AND (!empty($_POST["iam"]))) {
              if (isset($_POST["phone"]) AND (!empty($_POST["phone"]))) {
                if (isset($_POST["country"]) AND (!empty($_POST["country"]))) {
                  if (isset($_POST["city"]) AND (!empty($_POST["city"]))) {
                    if (isset($_POST["postal"]) AND (!empty($_POST["postal"]))) {
                      if (isset($_POST["street"]) AND (!empty($_POST["street"]))) {

                        $username = htmlspecialchars($_POST["username"]);
                        $email = htmlspecialchars($_POST["email"]);

                        if ($_POST["password"] == $_POST["password_again"]) {

                          $password = htmlspecialchars($_POST["password"]);
                          $phone = htmlspecialchars($_POST["password"]);
                          $address = [
                            "country" => htmlspecialchars($_POST["country"]),
                            "city" => htmlspecialchars($_POST["city"]),
                            "postal" => htmlspecialchars($_POST["postal"]),
                            "app" => htmlspecialchars($_POST["app"]),
                            "street" => htmlspecialchars($_POST["street"])
                          ];

                          switch (htmlspecialchars($_POST["iam"])) {
                            case 'glaner':
                              $iam = 1;
                              break;
                            case 'farmer':
                              $iam = 2;
                              break;
                            case 'foodbank':
                              $iam = 3;
                              break;
                            default:
                              $iam = 1;
                              break;
                          }

                          $req = $db->prepare("SELECT COUNT(*) AS nb FROM users WHERE name = ?");
                          $req->execute(array($username));
                          $req = $req->fetch();

                          if ($req["nb"] == 0) {
                            $req = $db->prepare("INSERT INTO users (name, email, password, type, phone, address) VALUES(?,?,?,?,?,?)");
                            $req->execute(array($username, $email, md5($password), $iam, $phone, json_encode($address)));
                          }

                          header("Location: /?page=login");

                        } else {
                          $message = "Password are not equal.";
                        }
                      } else {
                        $message = "Please fill in all inputs.";
                      }
                    } else {
                      $message = "Please fill all inputs.";
                    }
                  } else {
                    $message = "Please fill all inputs.";
                  }
                } else {
                  $message = "Please fill all inputs.";
                }
              } else {
                $message = "Please fill all inputs.";
              }
            } else {
              $message = "Please fill all inputs.";
            }
          } else {
            $message = "Please fill all inputs.";
          }
        } else {
          $message = "Please fill all inputs.";
        }
      } else {
        $message = "Please fill all inputs.";
      }
    } else {
      $message = "Please fill in all inputs.";
    }
  }
