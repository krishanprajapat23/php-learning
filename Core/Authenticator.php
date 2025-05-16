<?php

namespace Core;
use Core\Session;

class Authenticator {
    public function attempt($email, $password){
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        // if email is found in db
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    // set the session that user has logged in ....
    public function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        // when login user regenerate the session id
        session_regenerate_id(true);
    }


    public function logout() {
        Session::destroy();        
    }
}
