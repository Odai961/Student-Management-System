<?php

use Core\App;

$db = App::resolve(\Core\Database::class);

$courses = $db->query('select * from courses')->all();

view('courses/index.view.php', [
    'courses' => $courses
]);