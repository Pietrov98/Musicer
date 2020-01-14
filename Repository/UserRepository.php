<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM User WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        $new_user =  new User(
            $user['email'],
            $user['password'],
            $user["ID"],
            $user['name'],
            $user['user_img'],
            $user['description'],
            $user['user_record'],
            $user['id_band']
        );
        return $new_user;

    }

    public function checkLogin(string $name): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM User WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        $new_user =  new User(
            $user['email'],
            $user['password'],
            $user["ID"],
            $user['name'],
            $user['user_img'],
            $user['description'],
            $user['user_record'],
            $user['id_band']
        );
        return $new_user;
    }

    public function getUserID(string $ID): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM User WHERE ID = :ID
        ');
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        $new_user =  new User(
            $user['email'],
            $user['password'],
            $user["ID"],
            $user['name'],
            $user['user_img'],
            $user['description'],
            $user['user_record'],
            $user['id_band']
        );
        return $new_user;
    }

    //to sprawdzic, cos nie gra
//    public function getUsers(): array {
//        $result = [];
//        $stmt = $this->database->connect()->prepare('
//            SELECT * FROM User
//        ');
//        $stmt->execute();
//        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach ($users as $user) {
//            $user =  new User(
//                $user['email'],
//                $user['password'],
//                $user['name'],
//                $user['user_img'],
//                $user['description'],
//                $user['user_record']
//            );
//            $user->setUserID($user['ID']);
//        }
//        return $result;
//    }

    public function addUser(User $user)
    {
        //sprawdzic nazwy w User
        $query = "INSERT INTO User (email, name, password, user_img, user_record, description, id_band) VALUES (?, ?, ?, ?, ?, ?, ?)";
        //$query = "INSERT INTO User VALUES (null,'$email', '$name', '$password')";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([$user->getEmail(),
                        $user->getName(),
                        $user->getPassword(),
                        $user->getUserImg(),
                        $user->getUserRecord(),
                        $user->getDescription(),
                        '0']);
    }

    private function checkData($value, $getFunction)
    {
        if(($value == "" && $getFunction == "") || ($value == "" && $getFunction != ""))
        {
            return $getFunction;
        }
        return $value;
    }

    public function fillData($description = "", $user_img = "", $user_record = "")
    {
        $userID = $_SESSION['id'];
        $user_check = $this->getUserID($userID);
        $user_img = $this->checkData($user_img, $user_check->getUserImg());
        $user_record = $this->checkData($user_record, $user_check->getUserRecord());
        $description = $this->checkData($description, $user_check->getDescription());
        if(ctype_space($description) && !ctype_space($user_check->getDescription()))
        {
            $description = $user_check->getDescription();
        }
        $query = "UPDATE User u
                    SET u.description = '$description', 
                    u.user_img = '$user_img', 
                    u.user_record = '$user_record'
                    WHERE u.ID = '$userID'";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute();
    }
}