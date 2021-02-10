<?php
  function redirectIfAuthenticated() {
    if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])) {
      $_SESSION['flash'] = 'You are already logged in';
      header('Location: /');
    }
  }

  function requireLogin() {
    if (!(isset($_SESSION['user_id']) || isset($_SESSION['admin_id']))) {
      $_SESSION['flash'] = 'You must log in first';
      header('Location: /views/user/login.php');
    }
  }
?>