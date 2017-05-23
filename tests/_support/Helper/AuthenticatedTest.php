<?php

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 22:04
 */

namespace Helper;

use FunctionalTester;

class AuthenticatedTest
{
    /**
     * Form credentials (Admin)
     * @var array
     */
    public static $adminLoginCredentials = [
        '_username' => 'admin',
        '_password' => 'asdasd',
    ];

    protected function loginAsAdmin(FunctionalTester $I)
    {
        $I->amOnRoute('login');
        $this->fillForm(self::$adminLoginCredentials, $I);
    }

    protected function fillForm(array $params, FunctionalTester $I)
    {
        $I->submitForm('form', $params);
    }
}