<?php
$errors = [];
$inputs = [];
if (is_post_request()) {
  $selected_patient = filter_input(
    INPUT_POST,
    'selected_patient',
    FILTER_SANITIZE_STRING,
  ) ?? '';
  $date = filter_input(
    INPUT_POST,
    'date',
    FILTER_SANITIZE_STRING,
  ) ?? '';
  $start = filter_input(
    INPUT_POST,
    'start_time',
    FILTER_SANITIZE_STRING,
  ) ?? '';
  $end = filter_input(
    INPUT_POST,
    'end_time',
    FILTER_SANITIZE_STRING,
  ) ?? '';
  $link = filter_input(
    INPUT_POST,
    'link',
    FILTER_SANITIZE_STRING,
  ) ?? '';

  if ($date === '') {
    $errors['date'] = 'A date must be selected';
  } else {
    $inputs['date'] = $date;
  }
  if ($start === '') {
    $errors['start'] = 'A start time must be selected';
  } else {
    $inputs['start'] = $start;
  }
  if ($end === '') {
    $errors['end'] = 'An end time must be selected';
  } else {
    $inputs['end'] = $end;
  }
  if ($link === '') {
    $errors['link'] = 'A link must be provided';
  } else {
    $inputs['link'] = $link;
  }
  if ($start !== '' && $end !== '') {
    if ($start > $end) {
      $errors['end'] = 'End time must be after start time';
    }
  }
  if ($errors) {
    redirect_with('booking.php', ['errors' => $errors, 'inputs' => $inputs]);
  }

  book_appointment($selected_patient, find_id_user()['id'], $date, $start, $end, $link);
  redirect_to('viewrequests.php');
}
if (is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
