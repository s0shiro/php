<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserID = 1;

//find the corresponding note
$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

//authorize the user
authorize($note['user_id'] === $currentUserID);

$errors = [];

//add a server side validation before submitting into the database
if (!Validator::string($_POST['body'], 1, 200)) {
    $errors['body'] = 'A body is required at least 1 character but at maximum of 200 character. Please try again.';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading'=> 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

//if no error then update the note
$db->query('UPDATE notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect the user
header('location: /notes');
die();