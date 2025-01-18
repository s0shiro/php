<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUserID = 1;

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserID);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);