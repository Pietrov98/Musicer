<?php

class MenuBarController {

    private function logoutUser()
    {
        if (isset($_POST['logout']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=login");
        }
    }

    private function userAccount()
    {
        if (isset($_POST['my_account']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
        }
    }

    private function userPost()
    {
        if (isset($_POST['mail_post']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=mail_post");
        }
    }

    private function userBand()
    {
        if (isset($_POST['my_band']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=user_band");
        }
    }

    private function userFriends()
    {
        if (isset($_POST['friends']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=friends");
        }
    }

    private function findBand()
    {
        if (isset($_POST['find_band']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
        }
    }

    public function barController()
    {
        $this->logoutUser();
        $this->userAccount();
        $this->userBand();
        $this->userFriends();
        $this->userPost();
        $this->findBand();
    }

}