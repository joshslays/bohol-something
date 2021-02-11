<?php
  session_start();
  include('../actions/helpers.php');

  if (isset($_POST['submit'])) {
    $method = $_POST['submit'];
    if (isAdmin()) {
      // TODO: delete all activities and then the package
      $_SESSION['flash'] = 'Successfully deleted the package!';
      header('Location: /packages.php');
    } else {
      echo '403';
    }
  }
?>