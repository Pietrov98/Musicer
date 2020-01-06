<?php

require_once 'AppController.php';
require_once 'MenuBarController.php';

class BoardController extends AppController
{
    public function editData()
    {
        $barController = new MenuBarController();
        if ($this->isPost())
        {
            if (isset($_POST['save_changes']))
            {
                $description = $_POST['description'];
                $photo = $_POST['user_photo'];
                $record = $_POST['user_record'];
                //tutaj dodac jakąś weryfikacje e-maila i dlugosc hasla czy cos
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }

            $barController->barController();
        }
        $this->render('board', ['posts' => ""]);
    }
}