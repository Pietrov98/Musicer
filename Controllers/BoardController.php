<?php

require_once 'AppController.php';

class BoardController extends AppController
{

    public function editData()
    {
        if ($this->isPost()) {
            if (isset($_POST['save_changes']))
            {
                $description = $_POST['description'];
                $photo = $_POST['user_photo'];
                $record = $_POST['user_redcor'];
                //tutaj dodac jakąś weryfikacje e-maila i dlugosc hasla czy cos
                var_dump($description);
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
        }
        $this->render('board', ['posts' => ""]);
    }
}