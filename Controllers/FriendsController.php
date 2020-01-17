<?php

require_once "FriendsController.php";
require_once 'Repository/FriendsRepository.php';
require_once 'Repository/MessageRepository.php';
require_once 'MenuBarController.php';


class FriendsController  extends AppController {

    function showFriends()
    {
        $friendsRepository = new FriendsRepository();
        $friends = $friendsRepository->getFriends();

        $result = array();
        $i = 0;
        foreach ($friends as $friend)
        {
            $result[$friend->getID()]['ID'] = $friend->getID();
            $result[$friend->getID()]['name'] = $friend->getName();
            $result[$friend->getID()]['user_img'] = $friend->getUserImg();
            $result[$friend->getID()]['user_record'] = $friend->getUserRecord();
            $result[$friend->getID()]['description'] = $friend->getDescription();
            $i++;
        }
        header('Content-type: application/json');
        http_response_code(200);

        echo $result ? json_encode($result) : '';
    }

    function sendMessage()
    {
        $friendsRepository = new FriendsRepository();

        $friends = $friendsRepository->getFriends();
        if ($this->isPost())
        {
            foreach ($friends as $friend)
            {
                if (isset($_POST[$friend->getID()]))
                {
                    $recipientID = $friend->getID();
                    if(isset($_POST['message_content']))
                    {
                        $content = $_POST['message_content'];
                        $message = new MessageRepository();
                        $message->newMessage($recipientID, $content);
                        $_SESSION['$recipientID'] = "";
                        $_SESSION['message_content'] = "";
                    }
                }
            }
        }

        //dodac nazwe zespolu do friend

        $this->render('friends');

    }

}