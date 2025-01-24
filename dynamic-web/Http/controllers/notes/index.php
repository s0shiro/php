<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$user_id = getUserId();

$notes = $db->query("SELECT * FROM notes where user_id = :id", [
    'id' => $user_id
])->fetchAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);