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

// Retrieve the user ID from the session
$user_id = getUserId();

if ($user_id) {
    $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => $user_id
    ]);

    header('location: /notes');
    die();
} else {
    // Handle the case where the user is not logged in
    $errors['user'] = 'User is not logged in. Please log in to create a note.';
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
