<?php

require_once 'Models/Invitation.php';

class InvitationRepository extends Repository {

    public function sendApplication($id_application)
    {
        $ID = $_SESSION['id'];
        $query = "INSERT INTO Invitation (id_sender, accepted, id_lookingForMembers) VALUES (?, ?, ?)";
        //$query = "INSERT INTO User VALUES (null,'$email', '$name', '$password')";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute([$ID,
            NULL,
            $id_application]);
    }

    public function getInvitations()
    {
        $band_id = $_SESSION['band_id'];
        $result_invitations = [];
        $stmt = $this->database->connect()->prepare("
                   SELECT DISTINCT i.id_sender, l.ID as lookID, i.ID as invID FROM Invitation i, lookingForMembers l, Band b, User u
                    WHERE i.id_lookingForMembers = l.ID AND u.id_band = '$band_id' AND l.id_band = '$band_id'
        ");
        $stmt->execute();
        $invitations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //tutaj wykorzystuje bandId do przechowania IDZgloeszenia
        foreach ($invitations as $invitation) {
            $id_sender = $invitation['id_sender'];
            $stmt = $this->database->connect()->prepare("
                   SELECT DISTINCT u.name, u.description, u.user_record, u.user_img, u.ID, u.id_band FROM User u
                   WHERE u.ID = '$id_sender'
                            ");
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result_invitations[] = new Invitation(
                new User("", "",$user[0]['name'], $user[0]['ID'],
                          $user[0]['user_img'], $user[0]['description'], $user[0]['user_record'], $user[0]['id_band']),
                $invitation['invID'],
                $invitation['lookID']
                );
        }
        return $result_invitations;

    }

    public function acceptInvitation(string $ID_inv, $id_sender, $id_lookForMembers)
    {

//        $stmt = $this->database->connect()->prepare("
//                SELECT DISTINCT l.id_band FROM Invitation i, lookingForMembers l
//                WHERE i.id_sender = '$id_sender' AND i.id_lookingForMembers = l.ID AND i.ID = '$ID_inv'");
//        $stmt->execute();
//        $band_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$band_id = $band_id[0]['id_band'];
        $band_id = $_SESSION['band_id'];
        $query = "UPDATE User u
                    SET u.id_band = '$band_id'
                    WHERE u.ID = '$id_sender'";
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("
                DELETE FROM Invitation WHERE id_sender = '$id_sender'
               ");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("
                DELETE FROM Invitation WHERE id_lookingForMembers = '$ID_inv'
               ");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("
                DELETE FROM lookingForMembers WHERE ID = '$id_lookForMembers'
               ");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("UPDATE User u
                    SET u.role = 'czlonek'
                    WHERE u.ID = '$id_sender'");
        $stmt->execute();

        $stmt = $this->database->connect()->prepare("
                  SELECT u.ID FROM Band b, User u WHERE u.id_band = b.ID AND b.ID = '$band_id' AND u.ID != '$id_sender'");
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($members as $member)
        {
            $stmt = $this->database->connect()->prepare("
                  INSERT INTO Friendship (id_first_friend, id_second_friend) VALUES (?, ?)");
            $stmt->execute([$id_sender,
                $member['ID']]);
        }

    }

    public function discardInvitation(string $ID_inv)
    {
        $stmt = $this->database->connect()->prepare("
                DELETE FROM Invitation WHERE ID = '$ID_inv'");
        $stmt->execute();
    }

}