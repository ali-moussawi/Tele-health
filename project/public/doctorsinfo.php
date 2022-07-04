<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/displaydoctors.php';
require_login();
$schedules = get_doctor_info($_SESSION['selected_doctor']);
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
  <title>Doctors' Info</title>
</head>

<body>
  <form action="doctorsinfo.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Day</th>
          <th>Start Time</th>
          <th>End Time</th>
        </tr>
      </thead>
      
        <tbody>
        <?php foreach ($schedules as $schedule) : ?>
          <tr>
            <td><?php echo $schedule['day_of_week'] ?></td>
            <td><?php echo $schedule['start_time'] ?></td>
            <td><?php echo $schedule['end_time'] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
     
    </table>
    <br />
    <div>
      <a href="displaydoctors.php" style="font-size: 25px;">Back</a>
    </div>
  </form>
</body>

</html>