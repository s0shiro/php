<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUserID = getUserId();

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['note_id']
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['note_id']
]);

header('location: /notes');
exit();