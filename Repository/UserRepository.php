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

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['ID']
        );
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

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['ID']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM User
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['name'],
                $user['password'],
                $user['ID']
            );
        }

        return $result;
    }

    public function addUser($email, $name, $password)
    {
        $query = "INSERT INTO User (email, name, password) VALUES (?, ?, ?)";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([$email, $name, $password]);
    }
}