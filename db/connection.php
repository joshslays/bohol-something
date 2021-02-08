<?php
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

  // $sql = 'SELECT email FROM users';

  // $result = mysqli_query($conn, $sql);

  // $user_emails = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // mysqli_free_result($result);

  // mysqli_close($conn);


?>