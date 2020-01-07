<?php

require_once "PostController.php";
require_once "AppController.php";

class PostController extends AppController {

    function acceptInvitation()
    {
        $this->render('mail_post');
    }

}