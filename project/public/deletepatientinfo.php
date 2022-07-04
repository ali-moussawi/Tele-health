<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Patient's diseases</title>
  <style>
    div {
      margin: 5px;
    }
  </style>
</head>

<body class="center">
  <main>
    <?php
    require __DIR__ . '/../src/bootstrap.php';
    require __DIR__ . '/../src/deletepatientinfo.php';
    require_login();

    $diseases = array_column(already_inserted_diseases(), 'disease');
    ?>

    <form action="deletepatientinfo.php" method="post">
      <h1>Please select your diseases:</h1>
      <ul>
        <?php foreach ($diseases as $key => $disease) : ?>
          <li style="list-style: none" ;>
            <div>
              <input type="checkbox" name="diseases[]" value="<?php echo $disease ?>" id="diseases_<?php echo $disease ?>" />
              <label for="diseases_<?php echo $disease ?>"><?php echo ucfirst($disease) ?></label>
              <small><?php echo $errors[$disease] ?? '' ?></small>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
      <div>
        <button type="submit">Delete</button>
        <a href="patient.php" style="float: right; font-size: 25px;">Back</a>
      </div>
    </form>
  </main>
</body>

</html>