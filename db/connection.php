<?php

//DB Params for production DB
define('SERVER_ROOT', preg_replace('|\\\|', '/', __DIR__));
define('CERTIFICATE_AUTHORITY_FILE', SERVER_ROOT. '/BaltimoreCyberTrustRoot.crt.pem');
define('DB_SERVER', 'cometobohol.mysql.database.azure.com');
define('DB_USER', 'cashmoney@cometobohol');
define('DB_PASS', 'Hokerzs26');
define('DB_NAME', 'odix');
define('DB_PORT', 3306);


$db_conn = mysqli_init();
mysqli_ssl_set($db_conn, NULL,NULL, CERTIFICATE_AUTHORITY_FILE, NULL, NULL);
mysqli_real_connect($db_conn, DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($db_conn)) {
  die('Failed to connect to MySQL: '.mysqli_connect_error());
}





/*
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
*/
?>