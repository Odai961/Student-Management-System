<?php
//validate the id
//redirect if passes
use Core\App;

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    abort();
}
$id = (int)$id;

$db = App::resolve(\Core\Database::class);
$course = $db->query('select * from courses where id =:id', [
    'id' => $id
])->findOrFail();

view('courses/edit.view.php', [
    'course' => $course
]);