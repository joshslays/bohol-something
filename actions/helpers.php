<?php
  function isLoggedIn() {
    return isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);
  }

  function isAdmin() {
    return isset($_SESSION['admin_id']);
  }

  function isUser() {
    return isset($_SESSION['user_id']);
  }
?>