<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');

$errors = [];

//add a server side validation before submitting into the database
if (!Validator::string($_POST['body'], 1, 200)) {
    $errors['body'] = 'A body is required at least 1 character but at maximum of 200 character. Please try again.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
die();


//validation issue