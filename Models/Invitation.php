<?php

class Invitation {
    private $user;
    private $id_invitation;
    private $id_lookingForMembers;

    public function __construct(User $user, $id_invitation, $id_lookingForMembers)
    {
        $this->user = $user;
        $this->id_invitation = $id_invitation;
        $this->id_lookingForMembers = $id_lookingForMembers;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getInvitation()
    {
        return $this->id_invitation;
    }
    public function getLookingForMembers()
    {
        return $this->id_lookingForMembers;
    }

}