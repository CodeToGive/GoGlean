<?php
  session_start();

  if (!empty($_GET["page"])) {
    $page = htmlspecialchars($_GET["page"]);
  } else {
    $page = "home";
  }

  // Do not check if page exist.

  // Include Controller
  require_once("Controllers/DBController.php");
  require_once("Controllers/PageControllers/" . str_replace("_", "/", $page) . "Controller.php");

  // Include views
  require_once("views/layouts/default.php");
