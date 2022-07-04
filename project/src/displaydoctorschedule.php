<?php
$error = [];
if (is_post_request()) {
  $selected_patient = filter_input(
    INPUT_POST,
    'patient_id',
    FILTER_SANITIZE_STRING,
  ) ?? '';

  if ($selected_patient !== '') {
    redirect_with('displaypatientinfo.php', ['selected_patient' => $selected_patient]);
  }
}
if (is_get_request()) {
  [$error] = session_flash('error');
}
