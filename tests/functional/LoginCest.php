<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 18:12
 */
class LoginCest
{

    /**
     * Correct form. (Admin)
     * @var array
     */
    public static $correctForm = [
        '_username' => 'admin',
        '_password' => 'asdasd',
    ];

    /**
     * Wrong password form (Admin)
     * @var array
     */
    public static $inCorrectForm = [
        '_username' => 'admin',
        '_password' => 'wrong_password',
    ];


    public function testRegisterCorrect(\FunctionalTester $I)
    {
        $I->wantTo('Login as admin correctly :)');
        $I->amOnRoute('login');
        $this->fillForm(self::$correctForm, $I);
        $I->dontSee('Inloggegevens zijn niet correct');
    }

    public function testRegisterIncorrect(\FunctionalTester $I)
    {
        $I->wantTo('Test login with wrong password :(');
        $I->amOnPage('/login');
        $this->fillForm(self::$inCorrectForm, $I);
        $I->see('Inloggegevens zijn niet correct');
    }

    public function testGoneEntries(FunctionalTester $I)
    {
        $I->wantTo('Test if login specific entries are gone when authorized! :)');
        $I->amOnRoute('login');
        $this->fillForm(self::$correctForm, $I);
        $I->dontSee('Inloggen');
        $I->dontSee('Registreer');
    }

    private function fillForm(array $params, \FunctionalTester $I)
    {
        $I->submitForm('form', $params);
    }

}