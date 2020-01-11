<?php

require_once 'AppController.php';
require_once 'Models/User.php';
require_once 'Repository/UserRepository.php';

//require_once __DIR__ . '/../Models/User.php';
//require_once __DIR__.'/../Repository/UserRepository.php';

class SecurityController extends AppController
{

    public function registerUser($userRepository)
    {
        if (isset($_POST['register_button']))
        {
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if($userRepository->getUser($email))
            {
                echo "Do adresu e-mail jest już przypisane konto";
                //$this->render('login', ['messages' => ['Do adresu e-mail jest już przypisane konto']]);
                return;
            }
            if($userRepository->checkLogin($login))
            {
                echo "Login został już wykorzystany";
                //$this->render('login', ['messages' => ['Login został już wykorzystany']]);
                return;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "Niepoprawny adres e-mail";
                //$this->render('login', ['messages' => ['Niepoprawny adres e-mail']]);
                return;
            }
            if($password2 != $password1)
            {
                echo "Hasła nie mogą się różnić";
                //$this->render('login', ['messages' => ['Hasła nie mogą się różnić']]);
                return;
            }
            else if(strlen($password1) < 6)
            {
                echo "Za krótkie hasło";
                //$this->render('login', ['messages' => ['Za krótkie hasło']]);
                return;
            }
            if(!preg_match("/^[a-zA-Z ]*$/",$login) || $login == "") //dodac cyfry
            {
                echo "Taki login nie może istnieć";
                //$this->render('login', ['messages' => ['Taki login nie może istnieć']]);
                return;
            }
            $new_user = new User($email, $password1, $login);
            $userRepository->addUser($new_user);
            $user = $userRepository->getUser($email);
            $_SESSION["id"] = $user->getID();
//            //tutaj dodac jakąś weryfikacje e-maila i dlugosc hasla czy cos
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=end_register");
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }

    public function login()
    {
        //$user = new User('johnny@pk.edu.pl', 'admin', 'Johnny', 'Snow');
        $userRepository = new UserRepository();
        if ($this->isPost())
        {
            if(isset($_POST['login_button']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $userRepository->getUser($email);
                if (!$user) {
                    $this->render('login', ['messages' => ['User with this email not exist!']]);
                    return;
                }

                if ($user->getPassword() !== $password) {
                    var_dump($user->getPassword());
                    var_dump($password);
                    $this->render('login', ['messages' => ['Wrong password!']]);
                    return;
                }

                $_SESSION["id"] = $user->getID();
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            }
            else
             {
                $this->registerUser($userRepository);
             }

        }
        $this->render('login');
    }
}