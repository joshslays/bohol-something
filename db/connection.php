<?php
  // do something about this smh
  $servername = "localhost";
  $username = "odix";
  $password = "fr33_l04d3r!";
  $dbname = "odix";

  // Create connection
  $db_conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
  } 

?>