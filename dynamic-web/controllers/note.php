<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";
$currentUserID = 1;

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
    ])->findOrFail();

authorize($note['user_id'] === $currentUserID);

require "views/note.view.php";