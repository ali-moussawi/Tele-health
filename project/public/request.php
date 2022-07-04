<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/request.php';
require_login();
?>
<?php view('header', ['title' =>
'Request Appointment']) ?>
<form action="request.php" method="post">
  <div>
    <input type="hidden" name="selected_doctor" value="<?php print_r($_SESSION['selected_doctor']); ?>">
    <input type="text" name="message" placeholder="Please provide your request with a message">
  </div>
  <div>
    <button type="submit">Request an appointment</button>
    <small><?php echo $error['no_msg'] ?? '' ?></small>
  </div>
  <br />
  <div>
    <a href="displaydoctors.php" style="font-size: 25px;">Back</a>
  </div>
</form>
<?php view('footer') ?>