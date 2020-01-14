<?php

class BandMember {
    private $name;
    private $user_img;

    public function __construct(string $name, string $user_img)
    {
        $this->name = $name;
        $this->user_img = $user_img;
        if ($this->user_img == "")
        {
            return $this->user_img = "nobody_img.jpg";
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserImg(): string
    {
        return $this->user_img;
    }

}