<?php
// validate the info if not validate return errors
//check if student already exist
// add student
//redirect
use Core\App;
use Core\Validator;

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$birth_date = $_POST['birth_date'];

$errors = [];

if (!Validator::string($first_name, 2, 55)) {
    $errors['first_name'] = 'name should be between 2 and 55 letters';
}

if (!Validator::string($last_name, 2, 55)) {
    $errors['last_name'] = 'name should be between 2 and 55 letters';
}

if (!Validator::email($email)) {
    $errors['email'] = 'invalid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'password should be between 7 and 255 characters';
}

if (!Validator::date($birth_date)) {
    $errors['birth_date'] = 'date of birth is required';
}

if (!empty($errors)) {
    return view('students/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(\Core\Database::class);

$user_exist = $db->query('select * from students where email = :email', [
    ':email' => $email
])->find();

if ($user_exist ?? false) {
    $errors['email'] = 'Student is already exist';
    return view('students/create.view.php', [
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO `students`(`first_name`, `last_name`, `birth_date`, `email`, `password`) 
VALUES (:first_name,:last_name,:birth_date,:email,:password)', [
    'first_name' => $first_name,
    'last_name' => $last_name,
    'birth_date' => $birth_date,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
]);

redirect('/students');




