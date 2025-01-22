<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];


//validate form inputs
$errors = array();

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be more than 7 characters but less than 255 characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
//check if account already exist
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if ($user) {
    //then there is already an account with that email address
    //If yes redirect the user to the login page
    header('location: /');
    exit();
} else {
    //If not save data into the database and register the user and logged the user
    $db->query('INSERT INTO users(email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    //mark that the user has logged in.
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
