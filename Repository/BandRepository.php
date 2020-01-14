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
}