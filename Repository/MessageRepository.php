<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/Message.php';
require_once 'Repository/UserRepository.php';


class MessageRepository extends Repository
{
    public function getReceivedMessages(): array
    {
        $result = [];
        $userID = $_SESSION['id'];
        $stmt = $this->database->connect()->prepare("
            SELECT m.content, m.date, m.id_sender FROM Message m WHERE m.id_recipient = $userID ORDER BY date DESC
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

    public function getSentMessages(): array
    {
        $result = [];
        $userID = $_SESSION['id'];
        $stmt = $this->database->connect()->prepare("
            SELECT m.content, m.date, m.id_recipient FROM Message m WHERE m.id_sender = $userID ORDER BY date DESC
        ");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userRepository = new UserRepository();
        foreach ($messages as $message) {
            $recipient = $userRepository->getUserID($message['id_recipient'])->getName();
            $result[] = new Message(
                $message['content'],
                $message['date'],
                $recipient
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