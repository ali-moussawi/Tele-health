<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' =>
'Doctor']) ?>
<p>
  Welcome
  <?= current_user() ?>
</p>
<br>
<div>
  <a href="viewrequests.php">View Requests</a>
</div>
<br>
<div>
  <a href="displaydoctorschedule.php">View Schedule</a>
</div>
<br>
<div>
  <a href="insertdoctorinfo.php">Insert</a>
</div>
<br>
<div>
  <a href="updatedoctorinfo.php">Update</a>
</div>
<br>
<div>
  <a href="deletedoctorinfo.php">Delete</a>
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