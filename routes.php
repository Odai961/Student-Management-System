<?php

$router->get('/', 'index.php');
//students
$router->get('/students', 'students/index.php');
//create student
$router->get('/students/create', 'students/create.php');
$router->post('/students', 'students/store.php');
//show one student
$router->get('/students/show', 'students/show.php');
//edit student
$router->get('/students/edit', 'students/edit.php');
$router->patch('/students', 'students/update.php');
$router->delete('/students', 'students/destroy.php');
//-------------------------------
//courses
$router->get('/courses','courses/index.php');
//create course
$router->get('/courses/create','courses/create.php');
$router->post('/courses','courses/store.php');
//show one course
$router->get('/courses/show','courses/show.php');
//edit course
$router->get('/courses/edit','courses/edit.php');
$router->patch('/courses','courses/update.php');
$router->delete('/courses','courses/destroy.php');
//register
$router->get('/register','auth/register/create.php');
$router->post('/register','auth/register/store.php');