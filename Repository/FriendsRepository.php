<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/User.php';

class FriendsRepository extends Repository {

    public function getFriends()
    {
        $result = [];
        $userID = $_SESSION['id'];
        $stmt = $this->database->connect()->prepare("
            SELECT f.id_second_friend as ID, u.name, u.user_img, u.user_record, u.description FROM Friendship f, User u
            WHERE f.id_first_friend = $userID AND u.ID = id_second_friend
            UNION ALL
            SELECT f.id_first_friend as ID, u.name, u.user_img, u.user_record, u.description FROM Friendship f, User u
            WHERE f.id_second_friend = $userID AND u.ID = id_first_friend
        ");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            $result[] = new User(
                "",
                "",
                $user['ID'],
                $user['name'],
                $user['user_img'],
                $user['description'],
                $user['user_record']);
        }
        // kurwa!!! Nowy standard - FTP API
//         $fp = fopen('friends.json', 'w');
//         fwrite($fp, json_encode($users));
//         fclose($fp);
        return $result;
    }
}
