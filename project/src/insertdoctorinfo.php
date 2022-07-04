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
          insert_doctor_dayofwork($day, $selected_starts[$day], $selected_ends[$day]);
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
  $already_inserted_days = array_column(already_inserted_days(), 'day_of_week');
  foreach ($days_of_week as $day) {
    if (!(in_array($day, $selected_days)) && !(in_array($day, $already_inserted_days))) {
      if ($selected_starts[$day] !== '' && $selected_ends[$day] !== '') {
        $inputs[$day]['start'] = $selected_starts[$day];
        $inputs[$day]['end'] = $selected_ends[$day];
        $errors[$day]['day'] = $day . ' must be selected';
      } elseif ($selected_starts[$day] !== '') {
        $inputs[$day]['start'] = $selected_starts[$day];
        $errors[$day]['end'] = 'end time must be selected';
        $errors[$day]['day'] = $day . ' must be selected';
      } elseif ($selected_ends[$day] !== '') {
        $inputs[$day]['end'] = $selected_ends[$day];
        $errors[$day]['start'] = 'start time must be selected';
        $errors[$day]['day'] = $day . ' must be selected';
      }
    }
  }

  if ($errors) {
    redirect_with('insertdoctorinfo.php', [
      'errors' => $errors,
      'inputs' => $inputs
    ]);
  }
  redirect_to('doctor.php');
}

if (is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
