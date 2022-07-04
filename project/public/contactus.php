<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contactus.php';
require_login();
if (find_user_type()['type'] === 'admin') {
  redirect_to('admin.php');
}
?>

<?php view('header', ['title' =>
'Contact us']) ?>

<form action="contactus.php" method="post">
  <div>
    <input type="text" name="message" placeholder="Please provide a message">
  </div>
  <div>
    <button type="submit">Send</button>
    <small><?php echo $error['no_msg'] ?? '' ?></small>
  </div>
  <br />
  <div>
    <a href="index.php" style="font-size: 25px;">Back</a>
  </div>
</form>
<?php view('footer') ?>