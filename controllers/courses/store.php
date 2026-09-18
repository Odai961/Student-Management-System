<?php
//validate the strings if not valid return erros
//check if there is a course with the same name
//add course then redirect

use Core\App;
use Core\Validator;
$course=[
'title' => $_POST['title'],
'price' => $_POST['price'],
'chapters' => $_POST['chapters'],
'start_date' => $_POST['start_date'],
'description' => $_POST['description']
];
$errors = [];

if (!Validator::string($course['title'], 1, 255)) {
    $errors['title'] = 'Invalid title';
}
if (!Validator::number($course['price'],0,100000)) {
    $errors['price'] = 'Invalid price';
}
if (!Validator::number($course['chapters'],1,1000)) {
    $errors['chapters'] = 'Invalid number of chapters';
}
if (!Validator::string($course['description'], 1)) {
    $errors['description'] = 'Invalid description';
}
if (!Validator::futureDate($course['start_date'])) {
    $errors['start_date'] = 'Invalid date';
}

if (!empty($errors)) {
    return view('courses/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(\Core\Database::class);
$course_exist = $db->query('select * from courses where title=:title', [
    'title' => $course['title']
])->find();

if ($course_exist) {
    $errors['title'] = 'course is already exist';
    return view('courses/create.view.php',[
        'errors'=>$errors
    ]);
}
$db->query('insert into courses(title,price,chapters,start_date,description) values(:title,:price,:chapters,:start_date,:description) ', [
    'title' => $course['title'],
    'price' => $course['price'],
    'chapters' => $course['chapters'],
    'start_date' => $course['start_date'],
    'description' => $course['description']
]);
redirect('/courses');
