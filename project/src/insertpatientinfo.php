<?php
$diseases = list_of_diseases();
$inserted_diseases = [];
$errors = [];
$inputs = [];
if (is_post_request()) {
  // sanitize the inputs
  $selected_diseases = filter_input(
    INPUT_POST,
    'diseases',
    FILTER_SANITIZE_STRING,
    FILTER_REQUIRE_ARRAY
  ) ?? [];

  // check data against the original values
  if ($selected_diseases) {
    foreach ($selected_diseases as $disease) {
      $inputs[$disease] = $disease;
      insert_patient_disease($disease);
    };
  }
  redirect_to('patient.php');
}

if (is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
