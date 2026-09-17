<?php
//check id
// if not exist 404
//if exist delete

use Core\App;

$id = $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    abort(404);
}

$db = App::resolve(\Core\Database::class);

$db->query('select * from students where id=:id', [
    'id' => $id
])->findOrFail();

$db->query('delete from students where id=:id', [
    'id' => $id
]);

redirect('/students');