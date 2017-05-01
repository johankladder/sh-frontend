<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;
use AppBundle\Modules\LanguageModule;

class LanguageModuleCest
{

    public function _before()
    {


        $loader = require __DIR__.'/../../vendor/autoload.php';

        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
        $_SESSION = []; // Define session
    }

    public function seeDefaultLanguage(FunctionalTester $I)
    {
        $I->amOnPage('/');

        // Check nav headers:
        $I->see('Map');
        $I->see('My Stadiums');
        $I->see('Top lists');
        $I->see('Profile');
    }

    public function seeDutchLanguageWhenSettingLanguageModule(FunctionalTester $I)
    {
        LanguageModule::setLang('nl');

        $I->amOnPage('/');

        // Check nav headers:
        $I->see('Kaart');
        $I->see('Mijn Stadions');
        $I->see('Top lijsten');
        $I->see('Profiel');
    }

    public function setLanguageUI(FunctionalTester $I)
    {
        $I->amOnPage('/');

        // See translated language entry in the menu:
        $I->see('Taal');
        $I->click('Taal');
        $I->see('English');
        $I->click('English');

        $I->amOnPage('/');
        $I->see('Language');
    }

}
