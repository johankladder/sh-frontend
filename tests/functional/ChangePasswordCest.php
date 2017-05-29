<?php
use Helper\AuthenticatedTest;

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 22:14
 */
class ChangePasswordCest extends AuthenticatedTest
{
    const CHANGE_PASSWORD_ID = 'Wachtwoord veranderen';

    private static $correctForm = [
        'form[old_password]' => 'asdasd',
        'form[new_password]' => 'wdwdwd',
        'form[password_confirmation]' => 'wdwdwd',
    ];

    private static $inCorrectForm = [
        'form[old_password]' => 'wrong_password',
        'form[new_password]' => 'wdwdwd',
        'form[password_confirmation]' => 'wdwdwd',
    ];

    private static $inCorrectForm2 = [
        'form[old_password]' => 'asdasd',
        'form[new_password]' => 'wdwdwd',
        'form[password_confirmation]' => 'wrong_password',
    ];

    public function testChangePasswordCorrectly(FunctionalTester $I)
    {
        $I->wantTo('Change password with correct credentials. :)');
        $this->loginAsAdmin($I);
        $I->see(self::CHANGE_PASSWORD_ID);
        $I->click(self::CHANGE_PASSWORD_ID);
        $this->fillForm(self::$correctForm, $I);
        $I->see('Wachtwoord succesvol veranderd');
    }

    public function testChangePasswordIncorrect(FunctionalTester $I)
    {
        $I->wantTo('Change password with wrong password :(');
        $this->loginAsAdmin($I);
        $I->amOnRoute('password-change');
        $I->see(self::CHANGE_PASSWORD_ID);
        $this->fillForm(self::$inCorrectForm, $I);
        $I->see('Opgegeven wachtwoord is niet correct');
    }

    public function testChangePasswordIncorrect2(FunctionalTester $I)
    {
        $I->wantTo('Change password with wrong password :(');
        $this->loginAsAdmin($I);
        $I->amOnRoute('password-change');
        $I->see(self::CHANGE_PASSWORD_ID);
        $this->fillForm(self::$inCorrectForm2, $I);
        $I->see('Wachtwoordconfirmatie is niet correct');
    }
}