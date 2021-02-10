<?php
  include('./views/header.php');
?>

<main class='mt-4'>
  <?php
    // query tall
    include('./db/connection.php');
    $query = "select * from packages";
    $results = mysqli_query($db_conn, $query);
  ?>

  <?php if (mysqli_num_rows($results) != 0) { ?>
    <div class='row m-auto w-75 p-4'>
      <?php foreach($results as $package) { ?>
        <a class="custom-link col-4 text-decoration-none text-dark mb-4"
          href="/package/index.php?package=<?php echo htmlspecialchars($package['id']); ?>">
          <div class="card shadow bg-light rounded">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo htmlspecialchars($package['name']); ?>
              </h5>
              <p class='card-text'>
                <span class='fw-bold'> Price: Php</span>
                <?php echo htmlspecialchars($package['price']) ?>
              </p>
              <p class="card-text">
                <?php echo "*" . htmlspecialchars($package['perks']); ?>
              </p>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  <?php } else { ?>
    <h1 class='text-center'> There are currently no packages </h1>
  <?php } ?>

</main>

<?php
  include('./views/footer.php');
?>