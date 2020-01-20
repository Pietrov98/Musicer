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

    function getApplications()
    {
        $invitationRepository = new InvitationRepository();
        $invitations = $invitationRepository->getInvitations();
        $result = array();

        $i = 0;
        foreach ($invitations as $invitation)
        {
            $result[$i]['ID'] = $invitation->getInvitation();
            $result[$i]['user_name'] = $invitation->getUser()->getName();
            $result[$i]['user_img'] = $invitation->getUser()->getUserImg();
            $result[$i]['user_description'] = $invitation->getUser()->getDescription();
            $result[$i]['user_record'] = $invitation->getUser()->getUserRecord();
            $i++;
        }

        header('Content-type: application/json');
        http_response_code(200);
        echo $result ? json_encode($result) : '';
    }

    function sendMessage()
    {
        if ($this->isPost())
        {
            if(isset($_POST['friend_select']))
            {
                $recipientID = $_POST['friend_select'];
                if (isset($_POST['message_content'])) {
                    $content = $_POST['message_content'];
                    $message = new MessageRepository();
                    $message->newMessage($recipientID, $content);
                }
            }
        }
        $this->render('mail_post');
    }

    function getFriends()
    {
        $friendsRepository = new FriendsRepository();
        $friends = $friendsRepository->getFriends();

        $result = array();
        foreach ($friends as $friend)
        {
            $result[$friend->getID()]['ID'] = $friend->getID();
            $result[$friend->getID()]['name'] = $friend->getName();
        }
        header('Content-type: application/json');
        http_response_code(200);

        echo $result ? json_encode($result) : '';
    }

    function acceptInvitation()
    {

        if ($this->isPost())
        {

            $invitationRepository = new InvitationRepository();
            $invitations = $invitationRepository->getInvitations();
            foreach ($invitations as $invitation)
            {
                $yes_post = $_POST["y".$invitation->getInvitation()];
                $no_post = $_POST["n".$invitation->getInvitation()];
                if (isset($yes_post)) {
                    $invitationRepository->acceptInvitation($invitation->getInvitation(),
                                                            $invitation->getUser()->getID(),
                                                            $invitation->getLookingForMembers());
                }
                else if (isset($no_post)) {
                    $invitationRepository->discardInvitation($invitation->getInvitation());
                }
            }
        }

        $this->render('mail_post');
    }
}