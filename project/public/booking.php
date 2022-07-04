<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/booking.php';
require_login();
?>
<?php view('header', ['title' =>
'Booking']) ?>

<body class="center">
  <main>
    <form action="booking.php" method="post">
      <h1>Please select a day:</h1>
      <input type="hidden" name="selected_patient" value="<?php echo $_SESSION['selected_patient'] ?>">
      <div>
        <label for="day"></label>
        <input type="date" name="date" id="day" value="<?php echo $inputs['date'] ?? '' ?>" />
        <small><?php echo $errors['date'] ?? '' ?></small>
      </div>
      <div>
        <label for="">Time Start</label>
        <input type="time" name="start_time" value="<?php echo $inputs['start'] ?? '' ?>" />
        <small><?php echo $errors['start'] ?? '' ?></small>
      </div>
      <div>
        <label for="">Time End</label>
        <input type="time" name="end_time" value="<?php echo $inputs['end'] ?? '' ?>" />
        <small><?php echo $errors['end'] ?? '' ?></small>
      </div>
      <div>
        <label for="">Meeting link</label>
        <input type="text" name="link" value="<?php echo $inputs['link'] ?? '' ?>" />
        <small><?php echo $errors['link'] ?? '' ?></small>
      </div>
      <div>
        <button type="submit">Insert</button>
        <a href="doctor.php" style="float: right; font-size: 25px;">Back</a>
      </div>
    </form>
    <?php view('footer') ?>