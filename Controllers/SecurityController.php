<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Models/User.php';

class SecurityController extends AppController
{

    public function registerUser()
    {
        if (isset($_POST['register_button']))
        {
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            //tutaj dodac jakąś weryfikacje e-maila i dlugosc hasla czy cos
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=end_register");
        }
    }

    public function login()
    {
        $user = new User('johnny@pk.edu.pl', 'admin', 'Johnny', 'Snow');

        if ($this->isPost())
        {
            if(isset($_POST['login_button']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($user->getEmail() !== $email) {
                    $this->render('login', ['messages' => ['User with this email not exist!']]);
                    return;
                }

                if ($user->getPassword() !== $password) {
                    $this->render('login', ['messages' => ['Wrong password!']]);
                    return;
                }

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
            $this->registerUser();
        }

        $this->render('login');
    }
}