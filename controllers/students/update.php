<?php
// Get the submitted student data
// Validate the submitted data
// Find the student being updated
// Check that the email is not already used by another student
// Update the student in the database
// Redirect after successful update

use Core\App;
use Core\Validator;

$student = [
    'id' => $_POST['id'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'birth_date' => $_POST['birth_date']
];


$errors = [];

if (!Validator::string($student['first_name'], 2, 55)) {
    $errors['first_name'] = 'name should be between 2 and 55 letters';
}

if (!Validator::string($student['last_name'], 2, 55)) {
    $errors['last_name'] = 'name should be between 2 and 55 letters';
}

if (!Validator::email($student['email'])) {
    $errors['email'] = 'invalid email address';
}

if (!Validator::string($student['password'], 7, 255)) {
    $errors['password'] = 'password should be between 7 and 255 characters';
}

if (!Validator::date($student['birth_date'])) {
    $errors['birth_date'] = 'date of birth is required';
}

if (!empty($errors)) {
    return view('students/edit.view.php', [
        'student' => $student,
        'errors' => $errors
    ]);
}

$db = App::resolve(Core\Database::class);

$student_exist = $db->query('select * from students where email=:email and id !=:id', [
    'id' => $student['id'],
    'email' => $student['email']
])->find();

if ($student_exist) {
    $errors['email'] = 'email address already exists try another email';
    return view('students/edit.view.php', [
        'student' => $student,
        'errors' => $errors
    ]);

}

$currentStudent = $db->query('select * from students where id =:id', [
    'id' => $student['id']
])->findOrFail();

$db->query('update students set first_name=:first_name ,last_name=:last_name,birth_date=:birth_date,email=:email,password=:password WHERE id=:id', [
    'id' => $student['id'],
    'first_name' => $student['first_name'],
    'last_name' => $student['last_name'],
    'birth_date' => $student['birth_date'],
    'email' => $student['email'],
    'password' => password_hash($student['password'], PASSWORD_DEFAULT)
]);

redirect('/students');
