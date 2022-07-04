<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/displaydoctorschedule.php';
require_login();
$schedules = get_doctor_schedule(find_id_user()['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    input+small,
    label+small,
    textarea+small,
    select+small,
    button+small {
      color: #dc3545;
    }
  </style>
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
  <script src="js/jquery.js"></script>
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#datatable").DataTable();
    });
  </script>
  <title>Doctors' Schedule</title>
</head>

<body>
  <form action="displaydoctorschedule.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Day</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Patient's Name</th>
          <th>Patient's Info</th>
        </tr>
      </thead>
     
        <tbody>
        <?php foreach ($schedules as $schedule) : ?>
          <tr>
            <td><?php echo $schedule['app_date'] ?></td>
            <td><?php echo $schedule['app_time'] ?></td>
            <td><?php echo $schedule['end_time'] ?></td>
            <td><?php echo $schedule['fname'] . " " . $schedule['lname'] ?></td>
            <td>
              <button type="submit" name="patient_id" value="<?php echo $schedule['id'] ?>">
                Info
              </button>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
  
    </table>
    <br />
    <div>
      <a href="doctor.php" style="font-size: 25px;">Back</a>
    </div>
  </form>
</body>

</html>