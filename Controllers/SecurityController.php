<?php

require_once 'AppController.php';
require_once 'Models/User.php';
require_once 'Repository/UserRepository.php';

//require_once __DIR__ . '/../Models/User.php';
//require_once __DIR__.'/../Repository/UserRepository.php';

class SecurityController extends AppController
{

    public function registerUser()
    {
        $userRepository = new UserRepository();
        if (isset($_POST['register_button']))
        {
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if($userRepository->getUser($email))
            {
                //echo "Do adresu e-mail jest już przypisane konto!";
                $this->render('login', ['register_posts' => ['Do adresu e-mail jest już przypisane konto']]);
                //return;
            }
            else if($userRepository->checkLogin($login))
            {
                //echo "Login został już wykorzystany!";
                $this->render('login', ['register_posts' => ['Login został już wykorzystany']]);
               // return;
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                //echo "Niepoprawny adres e-mail!";
                $this->render('login', ['register_posts' => ['Niepoprawny adres e-mail']]);
               // return;
            }
            else if($password2 != $password1)
            {
                //echo "Hasła nie mogą się różnić!";
                $this->render('login', ['register_posts' => ['Hasła nie mogą się różnić']]);
                //return;
            }
            else if(strlen($password1) < 6)
            {
                //echo "Za krótkie hasło!";
                $this->render('login', ['register_posts' => ['Za krótkie hasło']]);
               // return;
            }
            else if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/',$login) || $login == "")
            {
                //echo "Taki login nie może istnieć!";
                $this->render('login', ['register_posts' => ['Taki login nie może istnieć']]);
            }
            $new_user = new User($email, $password1, $login);
            $userRepository->addUser($new_user);
            $user = $userRepository->getUser($email);
            $_SESSION["id"] = $user->getID();

//            //tutaj dodac jakąś weryfikacje e-maila i dlugosc hasla czy cos
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=end_register");
        }
        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('login');
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
                    $this->render('login', ['login_posts' => ['Taki użytkownik nie istnieje!']]);
                    return;
                }

                else if ($user->getPassword() !== $password) {
                    $this->render('login', ['login_posts' => ['Błędne hasło!']]);
                    return;
                }

                $_SESSION["id"] = $user->getID();
                $_SESSION["user_img"] = $user->getUserImg();
                $_SESSION["name"] = $user->getName();
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            }
//            else
//             {
//                $this->registerUser($userRepository);
//             }

        }
        $this->render('login');
    }
}