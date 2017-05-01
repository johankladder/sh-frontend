<?php

use AppBundle\Modules\LanguageModule;

class LanguageModuleCest
{
    // public function _before(FunctionalTester $I)
    // {
    // }
    //
    // public function _after(FunctionalTester $I)
    // {
    // }

    // tests
    public function seeDefaultLanguage(FunctionalTester $I)
    {
        // Default language = English
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

}
