<?php
  function isLoggedIn() {
    return isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);
  }
?>