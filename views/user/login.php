<?php
  include('../header.php');
?>

<h1 class='text-center'> Login </h1>

<?php
  $user_type = 'user';
  $method = 'login';
  include('../shared/login_form.php');
  include('../footer.php');
?>