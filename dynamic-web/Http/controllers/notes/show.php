<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$user_id = getUserId();

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $user_id);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);