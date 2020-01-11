<?php

require_once "BandController.php";
require_once "MenuBarController.php";

class BandController extends AppController {

    public function bandOptions()
    {
        $barController = new MenuBarController();

        if ($this->isPost())
        {
            $barController->barController();
        }
        $userRepository = new UserRepository();
        $user = $userRepository->getUserID($_SESSION['id']);
        $this->render('user_band', ['user' => $user]);
    }
}