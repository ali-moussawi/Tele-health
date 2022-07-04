<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
$options = [
  'Family practice physician', 'Internal medicine physician', 'Pediatricians', 'Geriatric medicine doctors', 'Allergists', 'Dermatologists', 'Infectious disease doctors', 'Ophthalmologists', 'Obstetrician/gynecologists', 'Cardiologists', 'Endocrinologists', 'Gastroenterologists', 'Nephrologists', 'Urologists', 'Pulmonologists', 'Otolaryngologists', 'Neurologists', 'Psychiatrists', 'Oncologists', 'Radiologists', 'Rheumatologists'
];
?>

<?php view('header', ['title' =>
'Register']) ?>

<body>
  <main>
    <form action="register.php" method="post">
      <h1>Sign Up</h1>

      <div>
        <label for="fname">FirsName:</label>
        <input type="text" name="fname" id="fname" value="<?= $inputs['fname'] ?? '' ?>" class="<?= error_class($errors, 'fname') ?>" />
        <small><?= $errors['fname'] ?? '' ?></small>
      </div>

      <div>
        <label for="mname">MiddleName:</label>
        <input type="text" name="mname" id="mname" value="<?= $inputs['mname'] ?? '' ?>" class="<?= error_class($errors, 'mname') ?>" />
        <small><?= $errors['mname'] ?? '' ?></small>
      </div>

      <div>
        <label for="lname">LastName:</label>
        <input type="text" name="lname" id="lname" value="<?= $inputs['lname'] ?? '' ?>" class="<?= error_class($errors, 'lname') ?>" />
        <small><?= $errors['lname'] ?? '' ?></small>
      </div>

      <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?>" />
        <small><?= $errors['email'] ?? '' ?></small>
      </div>

      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?>" />
        <small><?= $errors['password'] ?? '' ?></small>
      </div>

      <div>
        <label for="password2">Password Again:</label>
        <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?>" />
        <small><?= $errors['password2'] ?? '' ?></small>
      </div>

      <div>
        <h3>Gender</h3>
        <small><?= $errors['gender'] ?? '' ?></small>
      </div>
      <hr>

      <div style="display: inline" ;>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male" <?php if (($inputs['gender'] ?? '') === 'male') {
                                                                    echo 'checked';
                                                                  } ?>>
      </div>
      <div style="display: inline" ;>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female" <?php if (($inputs['gender'] ?? '') === 'female') {
                                                                        echo 'checked';
                                                                      } ?>>
      </div>

      <hr>

      <div>
        <h3>Type</h3>
        <small><?= $errors['type'] ?? '' ?></small>
      </div>
      <hr>

      <div>
        <label for="type">Doctor</label>
        <input type="radio" name="type" id="doctor" value="doctor" <?php if (($inputs['type'] ?? '') === 'doctor') {
                                                                      echo 'checked';
                                                                    } ?>>


        <div>
          <label for="speciality">Speciality:</label>
          <select name="speciality" id="speciality">
            <option selected="true" disabled="disabled" value="">
              Choose a speciality
            </option>
            <?php foreach ($options as $option) { ?>
              <option value="<?= $option ?>"><?php echo $option ?></option>
            <?php } ?>
          </select>
          <small><?= $errors['speciality'] ?? '' ?></small>
        </div>

        <hr>

        <label for="type">Patient</label>
        <input type="radio" name="type" id="patient" value="patient" <?php if (($inputs['type'] ?? '') === 'patient') {
                                                                        echo 'checked';
                                                                      } ?>>
        <div>
          <label for="birthdate">Birthdate:</label>
          <input type="Date" name="birthdate" id="birthdate" value="<?= $inputs['birthdate'] ?? '' ?>" />
          <small><?= $errors['birthdate'] ?? '' ?></small>
        </div>

        <hr>

        <label for="type">Other</label>
        <input type="radio" name="type" id="other" value="other" <?php if (($inputs['type'] ?? '') === 'other') {
                                                                    echo 'checked';
                                                                  } ?>>
      </div>

      <div>
        <label for="agree">
          <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I agree with the
          <a href="#" title="term of services">term of services</a>
        </label>
        <small><?= $errors['agree'] ?? '' ?></small>
      </div>

      <button type="submit">Register</button>

      <footer>Already a member? <a href="login.php">Login here</a></footer>
    </form>

    <?php view('footer') ?>