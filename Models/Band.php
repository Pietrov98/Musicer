<?php

class Band{

    private $members=array();
    private $band_name;
    private $band_description;
    private $band_img;
    private $ID;

    public function __construct($members, $band_name = " ", $band_description = " ", $band_img = " ", $ID = "")
    {
        if($members != "")
        {
            $this->members = $members;
        }
        $this->band_description = "";
        if($band_description != null)
        {
            $this->band_description = $band_description;

        }
        $this->band_img = "";
        if($band_img != null)
        {
            $this->band_img = $band_img;

        }
        $this->band_name = "";
        if($band_name != null)
        {
            $this->band_name = $band_name;

        }
        $this->ID = $ID;
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

    public function getBandID()
    {
        return $this->ID;
    }

}