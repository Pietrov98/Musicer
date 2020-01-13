<?php

require_once "FriendsController.php";
require_once 'Repository/FriendsRepository.php';
require_once 'Repository/MessageRepository.php';
require_once 'MenuBarController.php';


class FriendsController  extends AppController {

    function showFriends()
    {
        $barController = new MenuBarController();
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
            $barController->barController();
        }
        $this->render('friends', ['friends' => $friends]);
    }

}