<?php
require_once 'EndRegisterController.php';
require_once 'Repository/UserRepository.php';
require_once 'Models/User.php';

class EndRegisterController extends AppController {

    public function fillData()
    {
        if ($this->isPost())
        {
            if(isset($_POST['save_changes']))
            {
                $description = $_POST['description'];

                $photo_name = $_FILES['user_photo']['name'];
                $record_name = $_FILES['user_record']['name'];
                //$file_type = $_FILES['user_photo']['type'];
                //$file_size = $_FILES['user_photo']['size'];
                $file_tem_loc_photo = $_FILES['user_photo']['tmp_name'];
                $file_tem_loc_record = $_FILES['user_record']['tmp_name'];
                $file_store_photo = 'C:\git\Musicer\Public\uploads\user_img/'.$photo_name;
                $file_store_record = 'C:\git\Musicer\Public\uploads\records/'.$record_name;
                move_uploaded_file($file_tem_loc_photo, $file_store_photo);
                move_uploaded_file($file_tem_loc_record, $file_store_record);
                $fill_data = new UserRepository();
                $fill_data->fillData($description, $photo_name, $record_name);
                $url = "http://$_SERVER[HTTP_HOST]/";

                $userRepository = new UserRepository();
                $user = $userRepository->getUserID($_SESSION['id']);
                $_SESSION["user_img"] = $user->getUserImg();
                $_SESSION["name"] = $user->getName();

//                $_SESSION["band_id"] = "";
//                $_SESSION["band_name"] = "";
//                $_SESSION["band_img"] = "";

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                //dodac kontrole wielkosci pliku i dlugosci nazwy

            }
        }
        $this->render('end_register');
    }
}