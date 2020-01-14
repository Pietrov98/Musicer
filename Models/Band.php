<?php

class Band{

    private $members=array();
    private $band_name;
    private $band_description;
    private $band_img;

    public function __construct($members, string $band_name, string $band_description, string $band_img)
    {
        $this->members = $members;
        $this->band_description = $band_description;
        $this->band_img = $band_img;
        $this->band_name = $band_name;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function getBandDescription()
    {
        return $this->band_description;
    }

    public function getBandImg()
    {
        return $this->band_img;
    }

    public function getBandName()
    {
        return $this->band_name;
    }

}