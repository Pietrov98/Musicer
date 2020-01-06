<?php
require_once 'EndRegisterController.php';

class EndRegisterController extends AppController {

    public function fillData()
    {
        if ($this->isPost())
        {
            if(isset($_POST['save_changes']))
            {
                $description = $_POST['description'];
                $photo = $_POST['user_photo'];
                $record = $_POST['user_record'];
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
        }
        $this->render('end_register');
    }
}