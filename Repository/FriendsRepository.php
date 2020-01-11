<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/User.php';

class FriendsRepository extends Repository {

    public function getFriends()
    {
        $result = [];
        $userID = $_SESSION['id'];
        $stmt = $this->database->connect()->prepare("
            SELECT f.id_second_friend, u.name, u.user_img, u.user_record, u.description FROM Friendship f, User u
            WHERE f.id_first_friend = $userID AND u.ID = id_second_friend
            UNION ALL
            SELECT f.id_first_friend, u.name, u.user_img, u.user_record, u.description FROM Friendship f, User u
            WHERE f.id_second_friend = $userID AND u.ID = id_first_friend
        ");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                "",
                "",
                $user['name'],
                $user['user_img'],
                $user['description'],
                $user['user_record']);
        }
        return $result;
    }
}