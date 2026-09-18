<?php

use Core\App;
use Core\Database;

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    abort(404);
}

$db = App::resolve(Database::class);

$student = $db->query('select * from students where id=:id', [
    'id' => $id
])->findOrFail();

view('students/edit.view.php', [
    'student' => $student
]);


