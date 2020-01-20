<?php

require_once 'Controllers/BoardController.php';
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/EndRegisterController.php';
require_once 'Controllers/BandController.php';
require_once 'Controllers/FriendsController.php';
require_once 'Controllers/PostController.php';
require_once 'Controllers/BandFinderController.php';


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
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'registerUser'
            ],
            'end_register' => [
                'controller' => 'EndRegisterController',
                'action' => 'fillData'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'user_band' => [
                'controller' => 'BandController',
                'action' => 'foundBand'
            ],
            'leave_band' => [
                'controller' => 'BandController',
                'action' => 'leaveBand'
            ],
            'find_member' => [
                'controller' => 'BandController',
                'action' => 'findMember'
            ],
            'friends' => [
                'controller' => 'FriendsController',
                'action' => 'sendMessage'
            ],
            'get_friends' => [
                'controller' => 'FriendsController',
                'action' => 'showFriends'
            ],
            "mail_post" => [
                'controller' => 'PostController',
                'action' => "acceptInvitation"
            ],
            "get_message_friends" => [
                'controller' => 'PostController',
                'action' => "getFriends"
            ],
            "send_message" => [
                'controller' => 'PostController',
                'action' => "sendMessage"
            ],
            "received_messages" => [
                'controller' => 'PostController',
                'action' => "getReceivedMessages"
            ],
            "sent_messages" => [
                'controller' => 'PostController',
                'action' => "getSentMessages"
            ],
            "get_applications" => [
                'controller' => 'PostController',
                'action' => "getApplications"],
            "find_band" => [
                'controller' => 'BandFinderController',
                'action' => "sendApplication"],

            "get_bands" => [
                'controller' => 'BandFinderController',
                'action' => "getBands"],

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