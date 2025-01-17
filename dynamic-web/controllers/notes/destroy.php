<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserID = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['note_id']
])->findOrFail();

authorize($note['user_id'] === $currentUserID);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['note_id']
]);

header('location: /notes');
exit();