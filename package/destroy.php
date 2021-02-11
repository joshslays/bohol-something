<?php
  session_start();
  include('../db/connection.php');
  include('../actions/helpers.php');

  // as spaghetti as it can be
  if (isset($_POST['submit'])) {
    $method = $_POST['submit'];
    if (isAdmin()) {

      // get package
      // feel free to replace this with a EXISTS query
      $package_id = (int) $_POST['package_id'];
      $package_query = mysqli_prepare($db_conn, 'SELECT * FROM packages where id = ? LIMIT 1');
      mysqli_stmt_bind_param($package_query, "i", $package_id);
      mysqli_stmt_execute($package_query);
      $package_result = mysqli_stmt_get_result($package_query);
      $package = mysqli_fetch_assoc($package_result);

      if ($package) {
        // delete all activities of that package
        $activities_query = mysqli_prepare($db_conn, 'DELETE FROM activities where package_id = ?');
        mysqli_stmt_bind_param($activities_query, "i", $package_id);
        $deleted_activities = mysqli_stmt_execute($activities_query);

        // delete the package
        if ($deleted_activities) {
          $delete_package_query = mysqli_prepare($db_conn, 'DELETE FROM packages where id = ?');
          mysqli_stmt_bind_param($delete_package_query, "i", $package_id);
          $deleted_package = mysqli_stmt_execute($delete_package_query);
          if ($deleted_package) {
            $_SESSION['flash'] = 'Successfully deleted the package!';
          } else {
            $_SESSION['flash'] = 'Failed to delete the package!';
          }
        } else {
          $_SESSION['flash'] = 'Failed to delete the package!';
        }

        header('Location: /packages.php');
      }
    } else {
      echo '403';
    }
  }
?>