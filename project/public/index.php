<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
if (find_user_type()['type'] === 'doctor') {
  redirect_to('doctor.php');
} elseif (find_user_type()['type'] === 'patient') {
  redirect_to('patient.php');
} elseif (find_user_type()['type'] === 'admin') {
  redirect_to('admin.php');
}
?>

<?php view('header', ['title' =>
'User']) ?>
<p>
  Welcome
  <?= current_user() ?>
</p>
<br>
<div>
  <a href="contactus.php">Contact us</a>
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