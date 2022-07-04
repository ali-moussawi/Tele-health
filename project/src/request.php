<?php
$inputs = [];
$error = [];
if (is_post_request()) {
  $msg = filter_input(
    INPUT_POST,
    'message',
    FILTER_SANITIZE_STRING
  ) ?? '';

  $selected_doctor = filter_input(
    INPUT_POST,
    'selected_doctor',
    FILTER_SANITIZE_NUMBER_INT
  ) ?? '';

  if ($msg !== '') {
    try {
      request_an_appointment(find_id_user()['id'], $selected_doctor, $msg);
      redirect_to('patient.php');
    } catch (Exception $ex) {
      $error[$selected_doctor] = 'A request is already pending';
      redirect_with('displaydoctors.php', ['error' => $error]);
    }
  }

  $inputs['msg'] = $msg;
  $inputs = $selected_doctor;
  $error['no_msg'] = 'please provide your request with a message';
  redirect_with('request.php', ['error' => $error, 'inputs' => $inputs]);
}
if (is_get_request()) {
  [$error, $inputs] = session_flash('error', 'inputs');
}
