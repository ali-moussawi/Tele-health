<?php
$error = [];
if (is_post_request()) {
  $selected_doctor = filter_input(
    INPUT_POST,
    'doctor_id',
    FILTER_SANITIZE_STRING,
  ) ?? '';

  $selected_doctor_info = filter_input(
    INPUT_POST,
    'doctor_id_info',
    FILTER_SANITIZE_STRING,
  ) ?? '';


  if ($selected_doctor !== '') {
    redirect_with('request.php', ['selected_doctor' => $selected_doctor]);
  }

  if ($selected_doctor_info !== '') {
    redirect_with('doctorsinfo.php', ['selected_doctor' => $selected_doctor_info]);
  }
}
if (is_get_request()) {
  [$error] = session_flash('error');
}
