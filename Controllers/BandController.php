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
        $this->render('user_band');
    }
}