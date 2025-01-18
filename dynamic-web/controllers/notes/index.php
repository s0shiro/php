<?php

use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$notes = $db->query("SELECT * FROM notes where user_id = 1")->fetchAll();



view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);