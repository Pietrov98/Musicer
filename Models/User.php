<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role = ['ROLE_USER'];

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}