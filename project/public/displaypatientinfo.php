<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
$diseases = get_patient_info($_SESSION['selected_patient']);
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
  <title>Patient's Info</title>
</head>

<body>
  <form action="displaypatientinfo.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Patient's Disease</th>
        </tr>
      </thead>
      
        <tbody>
        <?php foreach ($diseases as $disease) : ?>
          <tr>
            <td><?php echo $disease['disease'] ?></td>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
  
    </table>
    <br />
    <div>
      <a href="displaydoctorschedule.php" style="font-size: 25px;">Back</a>
    </div>
  </form>
</body>

</html>