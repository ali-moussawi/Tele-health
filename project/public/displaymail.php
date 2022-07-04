<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/displaymail.php';
require_login();
$mails = get_mail();
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

  <title>Mail</title>
</head>

<body>
  <form action="displaymail.php" method="post">
    <table id="datatable">
      <thead>
        <tr>
          <th>Name</th>
          <th>message</th>
          <th>mail</th>
          <th>Replied</th>
        </tr>
      </thead>
 
        <tbody>
        <?php foreach ($mails as $mail) : ?>
          <tr>
            <td><?php echo $mail['fname'] . " " . $mail['lname'] ?></td>
            <td><?php echo $mail['message'] ?></td>
            <td>
              <a href="mailto: <?php echo $mail['email'] ?>">
                <?php echo $mail['email'] ?>
              </a>
            </td>
            <td>
              <button type="submit" name="mail_id" value="<?php echo $mail['mail_id'] ?>">
                Replied
              </button>
              <small><?php echo $error['mail_id'] ?? '' ?></small>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
   
    </table>
    <div>
      <a href="admin.php" style="font-size: 25px">Back</a>
    </div>
  </form>
</body>

</html>
<script>
  $(document).ready(function() {
    $("#datatable").DataTable();
  });
</script>