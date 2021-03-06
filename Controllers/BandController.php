<?php

require_once "BandController.php";
require_once "MenuBarController.php";
require_once 'Repository/UserRepository.php';
require_once 'Repository/BandRepository.php';
require_once __DIR__.'/../Models/Band.php';


class BandController extends AppController {

    public function leaveBand()
    {
        $bandRepository = new BandRepository();
        if ($this->isPost())
        {
            if(isset($_POST['leave_band']))
            {
                $bandRepository->leaveBand();
            }
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUserID($_SESSION['id']);
        if($user->getBandID() != null)
        {
            $_SESSION["band_id"] = $user->getBandID();
            $band = $bandRepository->getBand();
            $this->render('user_band', ['band' => $band]);
        }
        else
            $this->render('user_band');
    }

    public function findMember()
    {
        $bandRepository = new BandRepository();
        if ($this->isPost())
        {
            if(isset($_POST['find_member']))
            {
                if(isset($_POST['member_description']))
                {
                    $bandRepository->findMember($_POST['member_description']);
                }

            }
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUserID($_SESSION['id']);
        if($user->getBandID() != null)
        {
            $_SESSION["band_id"] = $user->getBandID();
            $band = $bandRepository->getBand();
            $this->render('user_band', ['band' => $band]);
        }
        else
            $this->render('user_band');
    }

    public function foundBand() //zaloz
    {
        $bandRepository = new BandRepository();
        if ($this->isPost())
        {
            if(isset($_POST['save_changes']))
            {
                $band_name = $_POST['band_name'];
                $band_description = $_POST['band_description'];
                if($band_name != "")
                {
                    $photo_name = $_FILES['band_photo']['name'];
                    $file_tem_loc_photo = $_FILES['band_photo']['tmp_name'];
                    $file_store_photo = 'C:\git\Musicer\Public\uploads\band_img/'.$photo_name;
                    move_uploaded_file($file_tem_loc_photo, $file_store_photo);
                    $new_band = new Band("", $band_name, $band_description, $photo_name);
                    $bandRepository->createBand($new_band);
                    //$band = $bandRepository->getBand();
                }
            }
        }
        $userRepository = new UserRepository();
        $user = $userRepository->getUserID($_SESSION['id']);
        if($user->getBandID() != null)
        {
            $_SESSION["band_id"] = $user->getBandID();
            $band = $bandRepository->getBand();
            $_SESSION['band_name'] = $band->getBandName();
            $_SESSION['band_img'] = $band->getBandImg();
            $band = $bandRepository->getBand();
            $this->render('user_band', ['band' => $band]);
        }
        else
            $this->render('user_band');

        //dodac szukanie czlonkow
    }
}