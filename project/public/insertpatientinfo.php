    <?php
    require __DIR__ . '/../src/bootstrap.php';
    require __DIR__ . '/../src/insertpatientinfo.php';
    require_login();

    $diseases = array_column(list_of_diseases(), 'disease_name');
    $inserted_diseases = array_column(already_inserted_diseases(), 'disease');
    ?>
    <?php view('header', ['title' =>
    'Patient Info']) ?>

    <body class="center">
      <main>

        <form action="insertpatientinfo.php" method="post">
          <h1>Please select your diseases:</h1>
          <ul>
            <?php foreach ($diseases as $disease) :
              if (in_array($disease, $inserted_diseases)) {
                continue;
              } else { ?>
                <li style="list-style: none" ;>
                  <div>
                    <input type="checkbox" name="diseases[]" value="<?php echo $disease ?>" id="diseases_<?php echo $disease ?>" <?php if (($inputs[$disease] ?? '') === $disease) {
                                                                                                                                    echo 'checked';
                                                                                                                                  } ?> />
                    <label for="diseases_<?php echo $disease ?>"><?php echo ucfirst($disease) ?></label>
                    <small><?php echo $errors[$disease] ?? '' ?></small>
                  </div>
                </li>
            <?php };
            endforeach ?>
          </ul>
          <div>
            <button type="submit">Insert</button>
            <a href="patient.php" style="float: right; font-size: 25px;">Back</a>
          </div>
        </form>
        <?php view('footer') ?>