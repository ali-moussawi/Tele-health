<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' =>
'Patient']) ?>
<p>
  Welcome
  <?= current_user() ?>
</p>
<div>
  <a href="displaydoctors.php">Display doctors</a>
</div>
<br>
<div>
  <a href="displaypatientschedule.php">Display schedule</a>
</div>
<br>
<div>
  <a href="insertpatientinfo.php">Insert</a>
</div>
<br>
<div>
  <a href="deletepatientinfo.php">Delete</a>
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