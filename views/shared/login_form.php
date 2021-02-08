<?php
  $errors = ['email' => '', 'password' => ''];

  if (isset($_POST['submit'])) {
    // ensure all fields aren't empty
    foreach($errors as $field => $error) {
      if (empty($_POST[$field])) {
        $errors[$field] = "can't be blank";
      }
    }
    
    // further validation here

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
