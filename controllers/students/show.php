<?php

$db= \Core\App::resolve(\Core\Database::class);

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    abort(404);
}

$student= $db->query('select * from students where id=:id',[
    'id'=>$id
])->findOrFail();


view('students/show.view.php',[
    'student'=>$student
]);
exit();