<?php

  // Database id
  $username = "root";
  $password = "";
  $dbname = "goglean";

  // Connection
  $db = new PDO("mysql:host=localhost;dbname=$dbname",
                $username,
                $password,
                array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
