<?php
if (is_post_request()) {
  $selected_patient = filter_input(
    INPUT_POST,
    'patient_id',
    FILTER_SANITIZE_STRING,
  ) ?? '';
  $selected_request = filter_input(
    INPUT_POST,
    'delete_patient_id',
    FILTER_SANITIZE_STRING,
  ) ?? '';

  if ($selected_patient !== '') {
    redirect_with('booking.php', ['selected_patient' => $selected_patient]);
  }
  if ($selected_request !== '') {
    delete_request($selected_request, find_id_user()['id']);
  }
}
if (is_get_request()) {
}
