<?php

/**
 * Register a user
 *
 * @param string $email
 * @param string $username
 * @param string $password
 * @param bool $is_admin
 * @return bool
 */
function register_user(string $fname, string $mname, string $lname, string $email, string $password, string $gender, string $type, string $define = ''): bool
{
  $sql = 'INSERT INTO users(fname, mname, lname, email, password, gender, type)
VALUES(:fname, :mname, :lname, :email, :password, :gender, :type)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':fname', $fname, PDO::PARAM_STR);
  $statement->bindValue(':mname', $mname, PDO::PARAM_STR);
  $statement->bindValue(':lname', $lname, PDO::PARAM_STR);
  $statement->bindValue(':email', $email, PDO::PARAM_STR);
  $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
  $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
  $statement->bindValue(':type', $type, PDO::PARAM_STR);

  $result = $statement->execute();

  if ($result) {
    if ($type === 'doctor') {
      if (add_to_doctors($email, $define)) {
        return $result;
      };
    } elseif ($type === 'patient') {
      if (add_to_patients($email, $define)) {
        return $result;
      };
    }
  }
  return $result;
}

function add_to_doctors(string $email, string $speciality): bool
{
  $user = find_user_id_by_email($email)['id'];

  $sql = 'INSERT INTO doctors(user_id,speciality) VALUES (:user_id,:speciality)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue(':speciality', $speciality, PDO::PARAM_STR);

  return $statement->execute();
}

function add_to_patients(string $email, string $birthdate): bool
{
  $user = find_user_id_by_email($email)['id'];

  $sql = 'INSERT INTO patients(user_id,birthdate) VALUES (:user_id,:birthdate)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);

  return $statement->execute();
}


function find_user_by_email(string $email)
{
  $sql = 'SELECT email, password
            FROM users
            WHERE email=:email';

  $statement = db()->prepare($sql);
  $statement->bindValue(':email', $email, PDO::PARAM_STR);
  $statement->execute();

  return $statement->fetch(PDO::FETCH_ASSOC);
}

function find_user_type()
{
  $sql = 'SELECT type
            FROM users
            WHERE email=:email';

  $statement = db()->prepare($sql);
  $statement->bindValue(':email', current_user(), PDO::PARAM_STR);
  $statement->execute();

  return $statement->fetch(PDO::FETCH_ASSOC);
}

function find_user_id_by_email(string $username)
{
  $sql = 'SELECT id
            FROM users
            WHERE email=:email';

  $statement = db()->prepare($sql);
  $statement->bindValue(':email', $username, PDO::PARAM_STR);
  $statement->execute();

  return $statement->fetch(PDO::FETCH_ASSOC);
}

function insert_doctor_dayofwork(string $day, string $start, string $end)
{
  $user = find_id_user()['id'];

  $sql = 'INSERT INTO daysofwork(user_id, day_of_week, start_time, end_time)
          VALUES (:user_id, :day_of_week, :start_time, :end_time)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue(':day_of_week', $day, PDO::PARAM_STR);
  $statement->bindValue(':start_time', $start, PDO::PARAM_STR);
  $statement->bindValue(':end_time', $end, PDO::PARAM_STR);

  $statement->execute();
}

function update_doctor_dayofwork(string $day, string $start, string $end)
{
  $user = find_id_user()['id'];

  $sql = 'UPDATE daysofwork SET start_time=:start_time, end_time=:end_time WHERE user_id=:user_id and day_of_week=:day_of_week';
  $statement = db()->prepare($sql);
  $statement->bindValue(':start_time', $start, PDO::PARAM_STR);
  $statement->bindValue(':end_time', $end, PDO::PARAM_STR);
  $statement->bindValue(':user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue(':day_of_week', $day, PDO::PARAM_STR);

  $statement->execute();
}

function delete_doctor_dayofwork($day)
{
  $user = find_id_user()['id'];

  $sql = 'DELETE FROM daysofwork WHERE user_id=:user_id and day_of_week=:day';
  $statement = db()->prepare($sql);
  $statement->bindValue('user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue('day', $day, PDO::PARAM_STR);

  $statement->execute();
}

function already_inserted_days()
{
  $user = find_id_user()['id'];

  $sql = 'SELECT day_of_week, start_time, end_time FROM daysofwork WHERE user_id=:user_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':user_id', intval($user), PDO::PARAM_INT);
  $statement->execute();

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function already_inserted_diseases()
{
  $user = find_id_user()['id'];

  $sql = 'SELECT disease FROM health_condition WHERE p_user_id=:p_user_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':p_user_id', intval($user), PDO::PARAM_INT);
  $statement->execute();

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function delete_patient_disease($disease)
{
  $user = find_id_user()['id'];

  $sql = 'DELETE FROM health_condition WHERE p_user_id=:p_user_id and disease=:disease';
  $statement = db()->prepare($sql);
  $statement->bindValue('p_user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue('disease', $disease, PDO::PARAM_STR);

  $statement->execute();
}

function list_of_diseases()
{
  $sql = 'SELECT * FROM diseases';

  $statement = db()->prepare($sql);
  $statement->execute();

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function insert_patient_disease($disease)
{
  $user = find_id_user()['id'];

  $sql = 'INSERT INTO health_condition(p_user_id, disease)
        VALUES (:p_user_id, :disease)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':p_user_id', intval($user), PDO::PARAM_INT);
  $statement->bindValue(':disease', $disease, PDO::PARAM_STR);

  $statement->execute();
}

function get_doctors()
{
  $sql = 'SELECT fname, lname, speciality, id FROM users u, doctors d WHERE u.id = d.user_id;';

  $statement = db()->prepare($sql);
  $statement->execute();

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function  request_an_appointment(string $p_id, string $d_id, string $msg)
{
  $sql = 'INSERT INTO appointment_requests(d_user_id, p_user_id, message) VALUES
          (:d_user_id, :p_user_id, :msg)';

  $statement = db()->prepare($sql);
  $statement->bindValue(':p_user_id', intval($p_id), PDO::PARAM_INT);
  $statement->bindValue(':d_user_id', intval($d_id), PDO::PARAM_INT);
  $statement->bindValue(':msg', $msg, PDO::PARAM_STR);

  return  $statement->execute();
}

function already_pending_request(string $d_id, string $p_id)
{
  $sql = 'INSERT INTO appointment_requests WHERE p_user_id = :p_id and d_user_id=:d_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);
  $statement->bindValue(':p_id', intval($p_id), PDO::PARAM_INT);

  return $statement->execute();
}

function view_requests(string $d_id)
{
  $sql = 'SELECT id, fname, lname, message, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM users u, appointment_requests a, patients p WHERE  a.p_user_id = u.id and a.d_user_id=:d_id and p.user_id = u.id;';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);

  $statement->execute();

  return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

function book_appointment(string $p_id, string $d_id, string $date, string $start, string $end, string $link)
{
  $sql = 'INSERT INTO appointments (p_user_id, d_user_id, app_date, app_time, end_time, app_link) VALUES 
          (:p_id, :d_id, :date, :start, :end, :link)';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);
  $statement->bindValue(':p_id', intval($p_id), PDO::PARAM_INT);
  $statement->bindValue(':date', $date, PDO::PARAM_STR);
  $statement->bindValue(':start', $start, PDO::PARAM_STR);
  $statement->bindValue(':end', $end, PDO::PARAM_STR);
  $statement->bindValue(':link', $link, PDO::PARAM_STR);

  if ($statement->execute()) {
    delete_request($p_id, $d_id);
  }
}

function delete_request(string $p_id, string $d_id)
{
  $sql = 'DELETE FROM appointment_requests WHERE 
          p_user_id=:p_id AND d_user_id=:d_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);
  $statement->bindValue(':p_id', intval($p_id), PDO::PARAM_INT);

  return $statement->execute();
}

function get_doctor_info(string $d_id)
{
  $sql = 'SELECT day_of_week, start_time, end_time FROM daysofwork WHERE user_id=:d_id;';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);

  $statement->execute();

  return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_doctor_schedule(string $d_id)
{
  $sql = 'SELECT app_date, app_time, end_time, fname, lname, id FROM appointments a, users u WHERE d_user_id=:d_id and u.id=a.p_user_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($d_id), PDO::PARAM_INT);

  $statement->execute();

  return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_patient_schedule(string $p_id)
{
  $sql = 'SELECT app_date, app_time, end_time, fname, lname,app_link	 FROM appointments a, users u WHERE p_user_id=:d_id and u.id=a.d_user_id';

  $statement = db()->prepare($sql);
  $statement->bindValue(':d_id', intval($p_id), PDO::PARAM_INT);

  $statement->execute();

  return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_patient_info(string $p_id)
{
  $sql = 'SELECT disease FROM health_condition WHERE p_user_id=:p_id;';

  $statement = db()->prepare($sql);
  $statement->bindValue(':p_id', intval($p_id), PDO::PARAM_INT);

  $statement->execute();

  return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

function  contact_us(string $u_id, string $msg)
{
  $sql = 'INSERT INTO mail(user_id, message) VALUES
          (:user_id, :msg)';

  $statement = db()->prepare($sql);
  $statement->bindValue(':user_id', intval($u_id), PDO::PARAM_INT);
  $statement->bindValue(':msg', $msg, PDO::PARAM_STR);

  return  $statement->execute();
}

function get_mail()
{
  $sql = 'SELECT fname, lname, message, email, mail_id FROM users u, mail m WHERE u.id = m.user_id and replied = 0;';

  $statement = db()->prepare($sql);
  $statement->execute();

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function mark_mail_as_replied(string $message_id)
{
  $sql = 'UPDATE mail SET replied = 1 WHERE :id = mail_id ';

  $statement = db()->prepare($sql);
  $statement->bindValue(':id', intval($message_id), PDO::PARAM_INT);

  return  $statement->execute();
}


function find_id_user()
{
  $sql = 'SELECT id
            FROM users
            WHERE email=:email';

  $statement = db()->prepare($sql);
  $statement->bindValue(':email', current_user(), PDO::PARAM_STR);
  $statement->execute();

  return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $email, string $password): bool
{
  $user = find_user_by_email($email);

  // if user found, check the password
  if ($user && password_verify($password, $user['password'])) {

    // prevent session fixation attack
    session_regenerate_id();

    // set email in the session
    $_SESSION['email'] = $user['email'];
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['type'] = $user['type'];

    return true;
  }

  return false;
}

function is_user_logged_in(): bool
{
  return isset($_SESSION['email']);
}

function require_login(): void
{
  if (!is_user_logged_in()) {
    redirect_to('login.php');
  }
}

function current_user()
{
  if (is_user_logged_in()) {
    return $_SESSION['email'];
  }
  return null;
}

function logout(): void
{
  if (is_user_logged_in()) {
    unset($_SESSION['email'], $_SESSION['user_id']);
    session_destroy();
    redirect_to('login.php');
  }
}
