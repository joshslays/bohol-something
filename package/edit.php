<?php
  include('../views/header.php');
?>

<main class='mt-4'>
  <?php
    include('../db/connection.php');
    if (isset($_POST['submit'])) {
      $package_id = (int) htmlspecialchars($_POST['package_id']);
      $redirect_to = "/package/index.php?package=" . $package_id;
      header("Location: $redirect_to");
    } else {
      $package_id = (int) htmlspecialchars($_GET['package']);
      $package_query = mysqli_prepare($db_conn, 'SELECT * FROM packages where id = ? LIMIT 1');
      mysqli_stmt_bind_param($package_query, "i", $package_id);
      mysqli_stmt_execute($package_query);
      $package_result = mysqli_stmt_get_result($package_query);
      $package = mysqli_fetch_assoc($package_result);
    }
  ?>

  <div class='m-auto text-center p-2 mb-2' style='width: max-content;'> 
    <a class='text-warning fw-bolder fs-3' href='/packages.php'> back to packages </a>
  </div>
  
  <?php if ($package) { ?>
    <div class="card shadow bg-light rounded col-6 mx-auto">
      <form class='p-2' action='edit.php' method='post'>
        <input type='hidden' name='package_id' value='<?php echo $package['id']?>' />
        <div class='form-group'>
          <label for='name'> Name </label>
          <input class='form-control' type='text' name='name'
            value="<?php echo htmlspecialchars($package['name']) ?>" placeholder="Name"/>
        </div>

        <div class='form-group mt-3'>
          <label for='good_for'> Good for? </label>
          <input class='form-control' type='number' name='good_for'
            value="<?php echo htmlspecialchars($package['good_for']) ?>" placeholder="How many?"/>
        </div>

        <div class='form-group mt-3'>
          <label for='perks'> Perks </label>
          <textarea class='form-control' type='text' name='perks' placeholder="Perks"><?php echo htmlspecialchars($package['perks']) ?></textarea>
        </div>

        <div class='form-group mt-3'>
          <input class='btn btn-sm btn-success' type='submit' name='submit' value='Update' />
          <a class="btn btn-sm btn-primary text-decoration-none"
            href="/package/index.php?package=<?php echo htmlspecialchars($package['id']); ?>">
            Show
          </a>
        </div>
      </form>

    </div>

  <?php } else { ?>
    <h1 class='text-center'> The package does not exist :( </h1>
  <?php } ?>
</main>

<?php
  include('../views/footer.php');
?>
