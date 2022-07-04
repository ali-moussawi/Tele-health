<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewrequests.php';
require_login();
$requests = view_requests(find_id_user()['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>View Requests</title>
</head>

<body>
  <form action="viewrequests.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Book</th>
          <th>Name</th>
          <th>Age</th>
          <th>message</th>
        </tr>
      </thead>
    
        <tbody>
        <?php foreach ($requests as $request) : ?>
          <tr>
            <td>
              <button type="submit" name="patient_id" value="<?php echo $request['id'] ?>">Book appointment</button>
              <button type="submit" name="delete_patient_id" value="<?php echo $request['id'] ?>">Remove request</button>
              <small><?php echo $error[$request['id']] ?? '' ?></small>
            </td>
            <td><?php echo $request['fname'] . " " . $request['lname'] ?></td>
            <td><?php echo $request['age'] ?></td>
            <td><?php echo $request['message'] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
     
    </table>
    <div>
      <a href="doctor.php" style="font-size: 25px;">Back</a>
    </div>
  </form>
</body>

</html>