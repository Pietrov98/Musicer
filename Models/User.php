<?php

class User
{
    private $ID;
    private $email;
    private $password;
    private $name;

    public function __construct(string $email, string $password, string $name, string $ID)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->ID = $ID;
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
}