<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' =>
'Admin']) ?>
<p>
  Welcome
  <?= current_user() ?>
</p>
<br>
<div>
  <a href="displaymail.php">Mail</a>
</div>
<br>
<div>
  <a href="home.php">Home</a>
</div>
<br>
<div>
  <a href="logout.php">Logout</a>
</div>
<?php view('footer') ?>