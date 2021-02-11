<?php if (isAdmin()) { ?>
  <section class='actions p-2 d-flex'>
    <a href="/package/edit.php?package=<?php echo htmlspecialchars($package['id']) ?>"
    class='btn btn-sm btn-success mx-2'>edit</a>
    <form action='/package/destroy.php' method='post'>
      <input type='hidden' name='method' value='delete' />
      <input type='hidden' name='package_id' value='<?php echo htmlspecialchars($package['id']) ?>' />
      <input class='btn btn-sm btn-danger' type='submit' name='submit' value='delete' />
    </form>
  </section>
<?php } ?>
