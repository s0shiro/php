<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                //return true if the user found
               return true;
            }
        }

        //return false if not
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logut()
    {
        Session::destroy();
    }

}