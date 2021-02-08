<?php
  $user_type = 'user';
  include('../header.php');
?>

<h1 class='text-center'> Sign up </h1>

<?php
  $user_type = 'login';
  $method = 'sign_up';
  include('../shared/login_form.php');
  include('../footer.php');
?>