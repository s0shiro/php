<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();
    if ($auth->attempt($email, $password)) {
        redirect('/');
    }else {
        $form->error('email', 'No account found on that email and password.');
    }

}

return view('session/create.view.php', [
    'errors' => $form->errors()
]);










