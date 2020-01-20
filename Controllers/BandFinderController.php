<?php

require_once 'Repository/BandRepository.php';
require_once 'Repository/MessageRepository.php';
require_once 'Repository/InvitationRepository.php';
require_once 'Models/Band.php';

class BandFinderController extends AppController
{

    public function getBands()
    {
        $result = array();
        $bandRepository = new BandRepository();
        $bands = $bandRepository->getLookingForMembersBands();
        foreach ($bands as $band)
        {
            $result[$band->getBandID()]['ID'] = $band->getBandID();
            $result[$band->getBandID()]['name'] = $band->getBandName();
            $result[$band->getBandID()]['band_img'] = $band->getBandImg();
            $result[$band->getBandID()]['description'] = $band->getBandDescription();
        }

        header('Content-type: application/json');
        http_response_code(200);

        echo $result ? json_encode($result) : '';

    }

    public function sendApplication()
    {

        if ($this->isPost())
        {
            $bandRepository = new BandRepository();
            $bands = $bandRepository->getLookingForMembersBands();
            foreach ($bands as $band)
            {
                if (isset($_POST[$band->getBandID()]))
                {
                    $invitationRepository = new InvitationRepository();
                    $invitationRepository->sendApplication($band->getBandID());
                }
            }
        }
        $this->render('band_finder');
    }

}