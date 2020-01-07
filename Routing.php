<?php

require_once 'Controllers/BoardController.php';
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/EndRegisterController.php';
require_once 'Controllers/BandController.php';
require_once 'Controllers/FriendsController.php';
require_once 'Controllers/PostController.php';


class Routing
{
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'editData'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'end_register' => [
                'controller' => 'EndRegisterController',
                'action' => 'fillData'
            ],

            'user_band' => [
                'controller' => 'BandController',
                'action' => 'bandOptions'
            ],
            'friends' => [
                'controller' => 'FriendsController',
                'action' => 'showFriends'
            ],
            "mail_post" => [
                'controller' => 'PostController',
                'action' => "acceptInvitation"
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';
        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}