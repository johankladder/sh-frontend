<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Modules\LanguageModule;

class LanguageController extends Controller
{
    /**
     * @Route("/language{lang}", name="language")
     */
    public function setAction($lang)
    {
        LanguageModule::setLang($lang);

        // TODO Redirect to last page
        return $this->redirectToRoute('homepage');
    }
}
