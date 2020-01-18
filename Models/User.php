<?php

class User
{
    private $ID;
    private $email;
    private $password;
    private $name;
    private $description;
    private $user_img;
    private $user_record;
    private $band_id;

    public function __construct(string $email = "",
                                string $password = "",
                                string $name = "",
                                string $ID = "",
                                string $user_img = "",
                                string $description = "",
                                string $user_record = "",
                                $band_id ="")
    {
        $this->email = $email;
        $this->password = $password;
        $this->ID = $ID;
        $this->name = $name;
        if ($user_img == "")
        {
            $this->user_img = "nobody_img.jpg";
        }
        else
        {
            $this->user_img = $user_img;
        }
        $this->description = $description;
        $this->user_record = $user_record;
        $this->band_id = $band_id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserImg()
    {
        return $this->user_img;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUserRecord()
    {
        return $this->user_record;
    }

    public function getBandID()
    {
        return $this->band_id;
    }


}