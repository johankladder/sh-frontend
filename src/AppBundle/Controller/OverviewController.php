<?php
/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 23:01
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Competition;
use AppBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OverviewController extends Controller
{

    /**
     * @Route("/overview", name="overview")
     */
    public function indexAction()
    {
        $countries = $this->getDoctrine()->getRepository(Country::class)->findAll();

        return $this->render('overview/index.html.php', ['countries' => $countries]);
    }

    /**
     * @Route("/overview-competition/{country}", defaults={"country" = 1}, name="overview-competition")
     */
    public function competionAction($country) {

        $country = $this->getDoctrine()->getRepository(Country::class)->find($country);

        $competitions = $country->getCompetitions();

        return $this->render('overview/competition.html.php', ['competitions' => $competitions]);
    }

    /**
     * @Route("/overview-clubs/{competition}", defaults={"competition" = 1}, name="overview-clubs")
     */
    public function clubsAction($competition)
    {

        $competition = $this->getDoctrine()->getRepository(Competition::class)->find($competition);

        $stadions = $competition->getStadions();

        return $this->render('overview/clubs.html.php', [
            'stadions' => $stadions
        ]);
    }
}