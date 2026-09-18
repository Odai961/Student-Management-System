<?php

use Core\App;

$id = $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    abort();
}
$id = (int)$id;

$db= App::resolve(\Core\Database::class);

$db->query('select * from courses where id=:id',[
   'id'=>$id
])->findOrFail();

$db->query('delete from courses where id =:id',[
    'id'=>$id
]);

redirect('/courses');