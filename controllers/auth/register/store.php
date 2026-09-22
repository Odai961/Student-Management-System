<?php
//validate form
//
use Core\App;
use Core\Validator;


$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

$errors=[];

if (!Validator::email($email)){
    $errors['email']='Invalid email address';
}
if (!Validator::string($password,7,255)){
    $errors['password']='Invalid password , at least 7 characters';
}
if ($password !== $confirm_password){
    $errors['confirm_password']='unmatched password';
}

if (!empty($errors)){
    return view('auth/register.view.php',[
        'errors'=>$errors
    ]);
}

$db= App::resolve(\Core\Database::class);
$email_exist= $db->query('select * from admins where email=:email',[
    'email'=>$email
])->find();

if ($email_exist){
    $errors['email']='email already exist';
    return view('auth/register.view.php',[
        'errors'=>$errors
    ]);
}


$db->query('insert into admins(email,password) values (:email,:password)',[
    'email'=>$email,
    'password'=>password_hash($password,PASSWORD_DEFAULT)
]);

redirect('/');