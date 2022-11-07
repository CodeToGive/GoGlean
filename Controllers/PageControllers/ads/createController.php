<?php
if (!empty($_POST["sendAdd"])) {
  if (isset($_POST["date_end"]) AND !empty($_POST["date_end"])) {
    if (isset($_POST["date_begin"]) AND !empty($_POST["date_begin"])) {
      if (isset($_POST["quantity"]) AND !empty($_POST["quantity"])) {
        if (isset($_POST["harvest"]) AND !empty($_POST["harvest"])) {

          $date_end = htmlspecialchars($_POST["date_end"]);
          $date_begin = htmlspecialchars($_POST["date_begin"]);
          $quantity = htmlspecialchars($_POST["quantity"]);
          $harvest = htmlspecialchars($_POST["harvest"]);
          $urgent = htmlspecialchars($_POST["urgent"]);

          $req = $db->prepare("INSERT INTO advertisements (user_id, begin_date, end_date, minimum, harvest, urgent) VALUES (?, ?, ?, ?, ?, ?)");
          $req->execute(array(
            $_SESSION["id"],
            $date_begin,
            $date_end,
            $quantity,
            $harvest,
            $urgent
          ));

          header("Location: /?page=profile");
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
}
