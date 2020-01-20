<?php

require_once 'Repository/UserRepository.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Models/Band.php';
require_once __DIR__.'/../Models/BandMember.php';


class BandRepository extends Repository {

    public function getBand()
    {
        $result_members = [];
        $ID = $_SESSION['band_id'];
        $stmt = $this->database->connect()->prepare("
            SELECT u.name, u.user_img FROM Band b, User u
            WHERE b.ID = $ID AND u.id_band = b.ID
        ");
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($members as $member) {
            $result_members[] = new BandMember(
                $member['name'],
                $member['user_img']);
        }

        $stmt = $this->database->connect()->prepare("
            SELECT DISTINCT name, band_img, description FROM Band
            WHERE ID = $ID
        ");
        $stmt->execute();
        $band_info = $stmt->fetch(PDO::FETCH_ASSOC);
        $band = new Band($result_members, $band_info['name'], $band_info['description'], $band_info['band_img']);

        return $band;
    }

    public function getSpecificBand(string $ID)
    {
        $stmt = $this->database->connect()->prepare("
            SELECT b.name, b.band_img FROM Band b, User u
            WHERE u.ID = $ID AND u.id_band = b.ID
        ");
        $stmt->execute();
        $band = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $new_band = new Band(
            array(),
            $band[0]['name'],
            "",
            $band[0]['band_img'],
            "");

        return $new_band;
    }


    public function createBand(Band $band)
    {
        //sprawdzic nazwy w User
        $query = "INSERT INTO Band (name, description, band_img) VALUES (?, ?, ?)";

        //$query = "INSERT INTO User VALUES (null,'$email', '$name', '$password')";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([
            $band->getBandName(),
            $band->getBandDescription(),
            $band->getBandImg()]);

        $stmt = $this->database->connect()->prepare("
            SELECT ID FROM Band ORDER BY ID DESC LIMIT 1
        ");
        $stmt->execute();
        $band_info = $stmt->fetch(PDO::FETCH_ASSOC);


        $band_id = $band_info['ID'];
        $userID = $_SESSION['id'];
        $_SESSION['role'] = 'founder';
        $stmt = $this->database->connect()->prepare("UPDATE User u
                    SET u.id_band = '$band_id'
                    WHERE u.ID = '$userID'");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("UPDATE User u
                    SET u.role = 'founder'
                    WHERE u.ID = '$userID'");
        $stmt->execute();
    }

    public function leaveBand()
    {
        $userID = $_SESSION['id'];
        $band_id = $_SESSION['band_id'];
        if( $_SESSION['role'] == 'founder')
        {
            $stmt = $this->database->connect()->prepare("
                  SELECT u.ID FROM Band  b, User u WHERE u.id_band = b.ID AND b.ID = '$band_id' AND u.ID != '$userID'");
            $stmt->execute();
            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $member = $members[0]['ID'];
            var_dump($member);
            $stmt = $this->database->connect()->prepare("
                    UPDATE User u
                    SET u.role = 'founder'
                    WHERE u.ID = '$member'");
            $stmt->execute();

        }

        $_SESSION['role'] = 'brak';
        $stmt = $this->database->connect()->prepare("UPDATE User u
                    SET u.id_band = NULL
                    WHERE u.ID = '$userID'");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("
                            SELECT COUNT(*) FROM (
                            SELECT DISTINCT u.ID FROM User u, Band b
	                        WHERE u.id_band = '$band_id') AS derived;");
        $stmt->execute();
        $member_quantity = $stmt->fetch(PDO::FETCH_ASSOC);
        if($member_quantity['COUNT(*)'] == 0)
        {
            $stmt = $this->database->connect()->prepare("DELETE FROM Band WHERE ID = '$band_id';");
            $stmt->execute();
        }

        $stmt = $this->database->connect()->prepare("UPDATE User u
                    SET u.role = 'brak'
                    WHERE u.ID = '$userID'");
        $stmt->execute();
    }

    public function getLookingForMembersBands()
    {
        $result_bands = [];
        $stmt = $this->database->connect()->prepare("
            SELECT l.ID, b.name, b.description, b.band_img FROM lookingForMembers l, Band b
            WHERE b.ID = l.id_band
        ");
        $stmt->execute();
        $bands = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //tutaj wykorzystuje bandId do przechowania IDZgloesznia
        foreach ($bands as $band) {
            $result_bands[] = new Band(
                array(),
                $band['name'],
                $band['description'],
                $band['band_img'],
                $band['ID']);
        }

        return $result_bands;
    }

    public function findMember(string $description)
    {
        $ID = $_SESSION['band_id'];

        $query = "INSERT INTO lookingForMembers (id_band, description) VALUES (?, ?)";
        //$query = "INSERT INTO User VALUES (null,'$email', '$name', '$password')";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([$ID, $description]);
    }

}