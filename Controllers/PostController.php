<?php

require_once "PostController.php";
require_once "AppController.php";
require_once __DIR__.'/../Models/Message.php';
require_once __DIR__.'/../Repository/MessageRepository.php';

class PostController extends AppController {

    function getReceivedMessages()
    {
        $messageRepository = new MessageRepository();
        $messages = $messageRepository->getReceivedMessages();

        $result = array();
        $i = 0;
        foreach ($messages as $message)
        {
            $result[$i]['content'] = $message->getContent();
            $result[$i]['date'] = $message->getDate();
            $result[$i]['sender_name'] = $message->getSenderName();
            $i++;
        }

        header('Content-type: application/json');
        http_response_code(200);
        echo $result ? json_encode($result) : '';
    }

    function getSentMessages()
    {
        $messageRepository = new MessageRepository();
        $messages = $messageRepository->getSentMessages();

        $result = array();
        $i = 0;
        foreach ($messages as $message)
        {
            $result[$i]['content'] = $message->getContent();
            $result[$i]['date'] = $message->getDate();
            $result[$i]['recipient_name'] = $message->getSenderName();
            $i++;
        }

        header('Content-type: application/json');
        http_response_code(200);
        echo $result ? json_encode($result) : '';
    }

    function acceptInvitation()
    {
        //$messageRepository = new MessageRepository();
        //$messages = $messageRepository->getMessages();
        //$this->render('mail_post', ['messages' => $messages]);

        $this->render('mail_post');
//        $userRepository = new UserRepository();
//        $user = $userRepository->getUserID($_SESSION['id']);
//        $this->render('friends', ['user' => $user]);
    }
}