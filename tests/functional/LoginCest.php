<?php
use Helper\AuthenticatedTest;

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 18:12
 */
class LoginCest extends AuthenticatedTest
{

    /**
     * Wrong password form (Admin)
     * @var array
     */
    public static $inCorrectForm = [
        '_username' => 'admin',
        '_password' => 'wrong_password',
    ];

    public function testRegisterCorrect(FunctionalTester $I)
    {
        $I->wantTo('Login as admin correctly :)');
        $this->loginAsAdmin($I);
        $I->dontSee('Inloggegevens zijn niet correct');
    }

    public function testRegisterIncorrect(FunctionalTester $I)
    {
        $I->wantTo('Test login with wrong password :(');
        $I->amOnPage('/login');
        $this->fillForm(self::$inCorrectForm, $I);
        $I->see('Inloggegevens zijn niet correct');
    }

    public function testGoneEntries(FunctionalTester $I)
    {
        $I->wantTo('Test if login specific entries are gone when authorized! :)');
        $this->loginAsAdmin($I);
        $I->dontSee('Inloggen');
        $I->dontSee('Registreer');
    }

}