<?php
  $errors = ['email' => '', 'password' => ''];

  if (isset($_POST['submit'])) {
    // email field validation
    if (empty($_POST['email'])) {
      $errors['email'] = "can't be blank";
    } else {
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'must be a valid email address';
      }
    }

    if (empty($_POST['password'])) {
      $errors['password'] = 'you must have a password!';
    } else {
      // FIXME: feel free to replace this with a regex or something better
      if (strlen($_POST['password']) < 8) {
        $errors['password'] = 'password must not be less than 8 characters';
      }
    }

    // on success
    if (!array_filter($errors)) {
      header('Location: /odix');
    }

  }
?>

<div class='row mx-auto justify-content-center mt-2'>

  <form class='col-6 border border-dark border-3 p-2'
    action=''
    method='POST'>

    <div class='form-group'>
      <label class='form-label' for='email'>Email</label>
      <input class='form-control' type='email' name='email' placeholder='email' autofocus/>
      <span class='text-danger'><?php echo $errors['email'] ?></span>
    </div>

    <div class='form-group'>
      <label class='form-label' for='password'> Password </label>
      <input class='form-control' type='password' name='password' placeholder='email' />
      <span class='text-danger'><?php echo $errors['password'] ?></span>
    </div>

    <div class='form-group mt-2'>
      <input class='btn btn-dark' type='submit' name='submit' value='Login' />
    </div>

  </form>
</div>
