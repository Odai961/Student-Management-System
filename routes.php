<?php

$router->get('/', 'index.php');
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
