<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>goGlean</title>

    <!-- CSS -->
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">
    <link rel="stylesheet" href="views/assets/css/style.css">
    <link rel="stylesheet" href="views/assets/css/panel.css">
    <link rel="stylesheet" href="views/assets/css/responsive.css">


  </head>
  <body>

    <!-- HEADER -->
    <?php require_once("views/elements/header.php"); ?>

    <!-- PAGE -->
    <?php
        require_once("views/pages/" . str_replace("_", "/", $page) . ".php");
    ?>

    <!-- FOOTER -->
    <?php require_once("views/elements/footer.php"); ?>


  </body>
</html>
