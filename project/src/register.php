<?php

if (is_user_logged_in()) {
  redirect_to('index.php');
}

$errors = [];
$inputs = [];

$options = [
  'Family practice physician',
  'Internal medicine physician',
  'Pediatricians',
  'Geriatric medicine doctors',
  'Allergists',
  'Dermatologists',
  'Infectious disease doctors',
  'Ophthalmologists',
  'Obstetrician/gynecologists',
  'Cardiologists',
  'Endocrinologists',
  'Gastroenterologists',
  'Nephrologists',
  'Urologists',
  'Pulmonologists',
  'Otolaryngologists',
  'Neurologists',
  'Psychiatrists',
  'Oncologists',
  'Radiologists',
  'Rheumatologists'
];

if (is_post_request()) {

  $fields = [
    'fname' => 'string | required | alphanumeric',
    'mname' => 'string | required | alphanumeric',
    'lname' => 'string | required | alphanumeric',
    'email' => 'email | required | email | unique: users, email',
    'password' => 'string | required | secure',
    'password2' => 'string | required | same: password',
    'gender' => 'string | required',
    'type' => 'string | required',
    'agree' => 'string | required'
  ];

  if ($_POST['type'] === 'doctor') {
    $fields['speciality'] = 'string | required';
  } elseif ($_POST['type'] === 'patient') {
    $fields['birthdate'] = 'string | required';
  }

  // custom messages
  $messages = [
    'password2' => [
      'required' => 'Please enter the password again',
      'same' => 'The password does not match'
    ],
    'agree' => [
      'required' => 'You need to agree to the term of services to register'
    ]
  ];

  [$inputs, $errors] = filter($_POST, $fields, $messages);


  if ($errors) {
    redirect_with('register.php', [
      'inputs' => $inputs,
      'errors' => $errors
    ]);
  }

  if ($inputs['type'] === 'doctor') {
    if (register_user($inputs['fname'], $inputs['mname'], $inputs['lname'], $inputs['email'], $inputs['password'], $inputs['gender'], $inputs['type'], $inputs['speciality'])) {
      redirect_with_message(
        'login.php',
        'Your account has been created successfully. Please login here.'
      );
    }
  } elseif ($inputs['type'] === 'patient') {
    if (register_user($inputs['fname'], $inputs['mname'], $inputs['lname'], $inputs['email'], $inputs['password'], $inputs['gender'], $inputs['type'], $inputs['birthdate'])) {
      redirect_with_message(
        'login.php',
        'Your account has been created successfully. Please login here.'
      );
    }
  } else {
    if (register_user($inputs['fname'], $inputs['mname'], $inputs['lname'], $inputs['email'], $inputs['password'], $inputs['gender'], $inputs['type'])) {
      redirect_with_message(
        'login.php',
        'Your account has been created successfully. Please login here.'
      );
    }
  }
} else if (is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');
}
