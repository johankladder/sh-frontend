<?php

namespace tests\functional;

class RegisterCest {

    public function _before()
    {
        $loader = require __DIR__.'/../../vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
        $_SESSION = []; // Define session
    }

    /**
     * Correct form.
     * @var array
     */
    public static $correctForm = [
        'form[email]' => 'email@test.com',
        'form[username]' => 'testuser',
        'form[password]' => 'password',
        'form[passwordConfirmation]' => 'password'
    ];

    /**
     * Form with wrong confirmation password.
     * @var array
     */
    public static $inCorrectForm1 = [
        'form[email]' => 'email@test.com',
        'form[username]' => 'testuser',
        'form[password]' => 'password',
        'form[passwordConfirmation]' => 'wrong_confirmation'
    ];

    public function testRegisterCorrect(\FunctionalTester $I)
    {
        $I->wantTo('Test register correctly! :)');
        $I->amOnRoute('register');
        $this->fillForm(self::$correctForm, $I);
        $I->see('Registratie voltooid!');
    }

    public function testRegisterIncorrect1(\FunctionalTester $I)
    {
        $I->wantTo('Test register with wrong confirmation password! :(');
        $I->amOnPage('/register');
        $this->fillForm(self::$inCorrectForm1, $I);
        $I->dontSee('Registratie voltooid!');
    }

    private function fillForm(array $params, \FunctionalTester $I)
    {
        $I->submitForm('form', $params);
    }
}
