<?php

require_once "BandController.php";
require_once "MenuBarController.php";
require_once 'Repository/UserRepository.php';
require_once 'Repository/BandRepository.php';


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
        $_SESSION["band_id"] = $user->getBandID();
        $bandRepository = new BandRepository();
        $band = $bandRepository->getBand();
        $this->render('user_band', ['band' => $band]);
        //dodac szukanie czlonkow
    }
}