<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/Message.php';
require_once 'Repository/UserRepository.php';


class MessageRepository extends Repository
{
    public function getMessages(): array
    {
        $result = [];
        $userID = $_SESSION['id'];
        //var_dump($userID);
        //SELECT m.content, m.date, u.name FROM Message m, User u WHERE u.ID = m.id_recipient
        $stmt = $this->database->connect()->prepare("
            SELECT m.content, m.date, m.id_sender FROM Message m WHERE m.id_recipient = $userID
        ");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userRepository = new UserRepository();
        foreach ($messages as $message) {
            $sender = $userRepository->getUserID($message['id_sender'])->getName();
            $result[] = new Message(
                $message['content'],
                $message['date'],
                $sender
            );
        }
        return $result;
    }

    public function newMessage(string $recipientID, string $content)
    {
        $query = "INSERT INTO Message (id_recipient, content, date, id_sender) VALUES (?, ?, ?, ?)";
        //$query = "INSERT INTO User VALUES (null,'$email', '$name', '$password')";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([$recipientID,
                        $content,
                        date("Y-m-d h:i:s"),
                        $_SESSION['id']]);
    }
}