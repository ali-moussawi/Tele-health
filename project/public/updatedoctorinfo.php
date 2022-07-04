<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/updatedoctorinfo.php';
require_login();

$days_of_week = array_column(already_inserted_days(), 'day_of_week');
?>
<?php view('header', ['title' =>
'Update Info']) ?>

<body class="center">
  <main>

    <form action="updatedoctorinfo.php" method="post">
      <h1>Please select your schedule:</h1>
      <ul>
        <?php foreach ($days_of_week as $day) : ?>
          <li style="list-style: none" ;>
            <div>
              <input type="checkbox" name="days_of_week[]" value="<?php echo $day ?>" id="days_of_week_<?php echo $day ?>" <?php if (($inputs[$day]['day'] ?? '') === $day) {
                                                                                                                              echo 'checked';
                                                                                                                            } ?> />
              <label for="days_of_week<?php echo $day ?>"><?php echo ucfirst($day) ?></label>
              <small><?php echo $errors[$day]['day'] ?? '' ?></small>
            </div>
            <div>
              <label for="">Time Start</label>
              <input type="time" name="start_time[<?php echo $day ?>]" value="<?= $inputs[$day]['start'] ?? '' ?>" />
              <small><?php echo $errors[$day]['start'] ?? '' ?></small>
            </div>
            <div>
              <label for="">Time End</label>
              <input type="time" name="end_time[<?php echo $day ?>]" value="<?= $inputs[$day]['end'] ?? '' ?>" />
              <small><?php echo $errors[$day]['end'] ?? '' ?></small>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
      <div>
        <button type="submit">Update</button>
        <a href="doctor.php" style="float: right; font-size: 25px;">Back</a>
      </div>
    </form>

    <?php view('footer') ?>