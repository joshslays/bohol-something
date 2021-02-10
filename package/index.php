<?php
  include('../views/header.php');
?>

<main class='mt-4'>
  <?php
    include('../db/connection.php');
    $package_id = (int) htmlspecialchars($_GET['package']);

    $package_query = mysqli_prepare($db_conn, 'SELECT * FROM packages where id = ? LIMIT 1');
    mysqli_stmt_bind_param($package_query, "i", $package_id);
    mysqli_stmt_execute($package_query);
    $package_result = mysqli_stmt_get_result($package_query);
    $package = mysqli_fetch_assoc($package_result);

    $activities_query = mysqli_prepare($db_conn, 'SELECT * FROM activities where package_id = ?');
    if ($package) {
      mysqli_stmt_bind_param($activities_query, "i", $package_id);
      mysqli_stmt_execute($activities_query);
      $activities = mysqli_stmt_get_result($activities_query);
    }
  ?>
  
  <?php if ($package) { ?>
    <div class="card shadow bg-light rounded col-6 mx-auto">
      <div class="card-body">
        <h5 class="card-title">
          <?php echo htmlspecialchars($package['name']); ?>
        </h5>

        <?php if (mysqli_num_rows($activities) != 0) { ?>
          <p class='card-text'>
            <span class='fw-bold'> Activities include: </span>
            <ul>
              <?php foreach($activities as $activity) { ?>
                <li> <?php echo htmlspecialchars($activity['description']) ?> </li>
              <?php } ?>
            </ul>
          </p>
        <?php } ?>

        <p class="card-text text-muted">
          <?php echo "*" . htmlspecialchars($package['perks']); ?>
        </p>

        <p class='card-text'>
          <span class='fw-bold'> Price: Php</span>
          <?php echo htmlspecialchars($package['price']) ?>
        </p>

      </div>
    </div>

  <?php } else { ?>
    <h1 class='text-center'> The package does not exist :( </h1>
  <?php } ?>


</main>

<?php
  include('../views/footer.php');
?>