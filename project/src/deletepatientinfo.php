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

  $inserted_diseases = array_column(already_inserted_diseases(), 'disease');

  // check data against the original values
  if ($selected_diseases) {
    foreach ($selected_diseases as $disease) {
      if (in_array($disease, $inserted_diseases)) {
        delete_patient_disease($disease);
      }
    };
  }
  redirect_to('patient.php');
}

if (is_get_request()) {
  $data = [];
  if (isset($_SESSION['inputs'])) {
    $data = $_SESSION['inputs'];
  }
  $inserted_diseases = array_column(already_inserted_diseases(), 'disease');
  foreach ($inserted_diseases as $disease) {
    $data[$disease] = $disease;
  }
  $_SESSION['inputs'] = $data;
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
