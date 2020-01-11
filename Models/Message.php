<?php

class Message {

    private $content;
    private $date;
    private $senderName;

    public function __construct($content, $date, $senderName)
    {
        $this->content = $content;
        $this->date = $date;
        $this->senderName = $senderName;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public  function getSenderName()
    {
        return $this->senderName;
    }
}