<?php

use Core\App;

$db = App::resolve(Core\Database::class);

$students = $db->query('SELECT * from `students`')->all();

view('students/index.view.php', [
    'students' => $students

]);
