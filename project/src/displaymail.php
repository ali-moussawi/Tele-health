<?php
$error = [];
if (is_post_request()) {
  $selected_message = filter_input(
    INPUT_POST,
    'mail_id',
    FILTER_SANITIZE_STRING,
  ) ?? '';

  if ($selected_message !== '') {
    try {
      mark_mail_as_replied($selected_message);
      redirect_to('displaymail.php');
    } catch (Exception $ex) {
      $error['displaymail_id'] = $ex;
      redirect_with('mail.php', ['error' => $error]);
    }
  }

  $error['mail_id'] = 'An error';
  redirect_with('displaymail.php', ['error' => $error]);
}
if (is_get_request()) {
  [$error] = session_flash('error');
}
