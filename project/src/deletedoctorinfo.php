<?php
$days_of_week = [
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday',
  'Sunday'
];
$errors = [];
$inputs = [];
if (is_post_request()) {
  // sanitize the inputs
  $selected_days = filter_input(
    INPUT_POST,
    'days_of_week',
    FILTER_SANITIZE_STRING,
    FILTER_REQUIRE_ARRAY
  ) ?? [];
  $selected_starts = filter_input(
    INPUT_POST,
    'start_time',
    FILTER_SANITIZE_STRING,
    FILTER_REQUIRE_ARRAY
  ) ?? [];
  $selected_ends = filter_input(
    INPUT_POST,
    'end_time',
    FILTER_SANITIZE_STRING,
    FILTER_REQUIRE_ARRAY
  ) ?? [];

  // check data against the original values
  if ($selected_days) {
    foreach ($selected_days as $day) {
      delete_doctor_dayofwork($day);
    }
    if ($errors) {
      redirect_with('deletedoctorinfo.php', [
        'errors' => $errors,
        'inputs' => $inputs
      ]);
    }
    redirect_to('doctor.php');
  }
}

if (is_get_request()) {
  $data = [];
  $count = 0;
  if (isset($_SESSION['inputs'])) {
    $data = $_SESSION['inputs'];
  }
  $inserted_days = array_column(already_inserted_days(), 'day_of_week');
  $inserted_stime = array_column(already_inserted_days(), 'start_time');
  $inserted_etime = array_column(already_inserted_days(), 'end_time');
  foreach ($inserted_days as $day) {
    $data[$day]['day'] = $day;
    $data[$day]['start'] = $inserted_stime[$count];
    $data[$day]['end'] = $inserted_etime[$count];
    $count++;
  }
  $_SESSION['inputs'] = $data;
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
