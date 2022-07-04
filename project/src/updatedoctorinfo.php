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
      $inputs[$day]['day'] = $day;
      if ($selected_starts[$day] !== '' && $selected_ends[$day] !== '') {
        $inputs[$day]['start'] = $selected_starts[$day];
        $inputs[$day]['end'] = $selected_ends[$day];
        if ($selected_starts[$day] < $selected_ends[$day]) {
          update_doctor_dayofwork($day, $selected_starts[$day], $selected_ends[$day]);
        } else {
          $errors[$day]['end'] = 'end time must be after start time';
        }
      } elseif ($selected_starts[$day] === '' && $selected_ends[$day] === '') {
        $errors[$day]['start'] = 'start time must be selected';
        $errors[$day]['end'] = 'start time must be selected';
      } elseif ($selected_ends[$day] === '') {
        $inputs[$day]['start'] = $selected_starts[$day];
        $errors[$day]['end'] = 'end time must be selected';
      } else {
        $inputs[$day]['end'] = $selected_ends[$day];
        $errors[$day]['start'] = 'start time must be selected';
      }
    }
  }
  if ($errors) {
    redirect_with('updatedoctorinfo.php', [
      'errors' => $errors,
      'inputs' => $inputs
    ]);
  }
  redirect_to('doctor.php');
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
    $data[$day]['start'] = $inserted_stime[$count];
    $data[$day]['end'] = $inserted_etime[$count];
    $count++;
  }
  $_SESSION['inputs'] = $data;
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
