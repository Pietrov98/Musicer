<?php

require_once "FriendsController.php";
require_once 'MenuBarController.php';


class FriendsController  extends AppController {

    function showFriends()
    {
        $barController = new MenuBarController();
        if ($this->isPost())
        {
            if (isset($_POST['send_message']))
            {
                $message = $_POST['message_content'];
            }
            $barController->barController();
        }
        $this->render('friends');
    }

}