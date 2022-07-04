<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/displaydoctors.php';
require_login();
$doctors = get_doctors();
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
  <script src="js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <title>Doctors</title>


</head>

<body>



  <form action="displaydoctors.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Name</th>
          <th>spreciality</th>
          <th>Info</th>
          <th>Book</th>
        </tr>
      </thead>
     
        <tbody>
        <?php foreach ($doctors as $doctor) : ?>
          <tr>
         
            <td><?php echo $doctor['fname'] . " " . $doctor['lname'] ?></td>

            <td><?php echo $doctor['speciality'] ?></td>

            <td>
              <button type="submit" name="doctor_id_info" value="<?php echo $doctor['id'] ?>">
                Schedule
              </button>
              <small><?php echo $error[$doctor['id']] ?? '' ?></small>
            </td>

            <td>
              <button type="submit" name="doctor_id" value="<?php echo $doctor['id'] ?>">
                Request an appointment
              </button>
              <small><?php echo $error[$doctor['id']] ?? '' ?></small>
            </td>
            
          </tr>
          <?php endforeach ?>
        </tbody>


    </table>
    <div>
      <small><?php echo $error['not_selected'] ?? '' ?></small>
    </div>
    <br />
    <div>
      <a href="patient.php" style="font-size: 25px">Back</a>
    </div>
  </form>




</body>

</html>


<script>
  $(document).ready(function() {
    $("#datatable").DataTable();
  });
</script>