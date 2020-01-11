<?php

require_once "PostController.php";
require_once "AppController.php";
require_once __DIR__.'/../Models/Message.php';
require_once __DIR__.'/../Repository/MessageRepository.php';

class PostController extends AppController {
    function acceptInvitation()
    {
        $messageRepository = new MessageRepository();
        $messages = $messageRepository->getMessages();
        $this->render('mail_post', ['messages' => $messages]);
//        $userRepository = new UserRepository();
//        $user = $userRepository->getUserID($_SESSION['id']);
//        $this->render('friends', ['user' => $user]);
    }
}