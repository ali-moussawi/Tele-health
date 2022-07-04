<?php
$inputs = [];
$error = [];
if (is_post_request()) {
  $msg = filter_input(
    INPUT_POST,
    'message',
    FILTER_SANITIZE_STRING
  ) ?? '';

  if ($msg !== '') {
    try {
      contact_us(find_id_user()['id'], $msg);
      redirect_to('index.php');
    } catch (Exception $ex) {
      $error['no_msg'] = $ex;
      redirect_with('contactus.php', ['error' => $error]);
    }
  }

  $inputs['msg'] = $msg;
  $error['no_msg'] = 'please provide a message';
  redirect_with('contactus.php', ['error' => $error, 'inputs' => $inputs]);
}
if (is_get_request()) {
  [$error, $inputs] = session_flash('error', 'inputs');
}
